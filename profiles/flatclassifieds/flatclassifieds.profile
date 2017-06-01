<?php
//

function system_form_install_select_profile_form_alter(&$form, $form_state) {
  foreach($form['profile'] as $key => $element) {
    $form['profile'][$key]['#value'] = 'flatclassifieds';
  }
}

function flatclassifieds_form_install_configure_form_alter(&$form, $form_state) {
//   drupal_set_message('<pre>'. check_plain(print_r($form, 1)) .'</pre>');
  $form['site_information']['site_name']['#default_value'] = 'FlatClassifieds';
  $form['site_information']['site_mail']['#default_value'] = 'admin@'. $_SERVER['HTTP_HOST'];
  $form['admin_account']['account']['name']['#default_value'] = 'admin';
  $form['admin_account']['account']['mail']['#default_value'] = 'admin@'. $_SERVER['HTTP_HOST'];
  $form['#submit'][] = '_wr_profile_install_configure_form_submit';
}

function _wr_profile_install_configure_form_submit($form, &$form_state) {
  global $user;
  $sql_file = dirname(__FILE__).'/site.sql';
  drupal_set_message("FlatClassifieds Easy Installation was a Success!");
  drupal_set_message("For security purposes, it's recommended that you delete $sql_file, or move the flatclassifieds profile folder out of your webroot.");
  variable_del('file_temporary_path');
  file_directory_temp();
  drupal_flush_all_caches();
  $form_state['build_info']['args'][0]['parameters']['profile'] = 'standard';
}

function _wr_profile_import_sql($filename){
  global $databases;
  $buffer='';
  $count=0;
  $handle = @fopen($filename, "r");
  if ($handle) {
    while (!feof($handle)) {
      $line = fgets($handle);
      $buffer.=$line;
      if(preg_match('|;$|', $line)){
        $count++;
        db_query(_wr_profile_prefixTables($buffer));
        $buffer='';
      }
    }
    fclose($handle);
  }
  return $count;
}

function _wr_profile_prefixTables($sql) {
  global $databases;
  $prefix = $databases['default']['default']['prefix'];
  if (is_array($prefix)) {
    $defaultPrefix = isset($prefix['default']) ? $prefix['default'] : '';
    unset($prefix['default']);
    $prefixes = $prefix;
  } else {
    $defaultPrefix = $prefix;
    $prefixes = array();
  }
  // Replace specific table prefixes first.
  foreach ($prefixes as $key => $val) {
    $sql = strtr($sql, array('prefixflcl_' . $key  => $val . $key));
  }
  // Then replace remaining tables with the default prefix.
  return strtr($sql, array('prefixflcl_' => $defaultPrefix ));
}
