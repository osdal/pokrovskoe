<?php

function flatclassifieds_form_system_theme_settings_alter(&$form, $form_state) {

  $path = libraries_get_path('colorpicker');
  drupal_add_css($path.'/css/colorpicker.css');
  drupal_add_js($path.'/js/colorpicker.js');
  drupal_add_js('
jQuery(document).ready(function($) {
$(\'.color\').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind(\'keyup\', function(){
	$(this).ColorPickerSetColor(this.value);
});
});
', array('type' => 'inline',  'scope' => 'header', 'weight' => 5));


  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advanced Theme Settings'),
  );

//   $form['advansed_theme_settings']['tm_value_14'] = array(
//     '#type' => 'select',
//     '#title' => t('Enable filter "My Location"'),
//     '#default_value' => theme_get_setting('tm_value_14'),
//     '#options' => array (
//       '0' => t('No'),
// 	    '1' => t('Yes'),
//     ),
//   );
  $form['advansed_theme_settings']['tm_value_14'] = array(
    '#type' => 'select',
    '#title' => t('Bootstrap'),
    '#default_value' => theme_get_setting('tm_value_14'),
    '#options' => array (
      '0' => t('Local'),
	    '1' => t('Bootstrap CDN'),
    ),
  );

  $form['advansed_theme_settings']['tm_value_15'] = array(
    '#type' => 'select',
    '#title' => t('Automatic creation of terms for Locations'),
    '#default_value' => theme_get_setting('tm_value_15'),
    '#options' => array (
      '0' => t('No'),
	    '1' => t('Yes'),
    ),
  );

  $form['advansed_theme_settings']['tm_value_gmap_api_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Maps API key'),
    '#default_value' => theme_get_setting('tm_value_gmap_api_key'),
    '#description' => t('<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">See Get a Key</a> for more information.')
  );

  $form['advansed_theme_settings']['tm_value_default_user_location'] = array(
    '#type' => 'textfield',
    '#title' => t('Default User Location'),
    '#default_value' => theme_get_setting('tm_value_default_user_location')
  );

  $form['advansed_theme_settings']['tm_value_user_location'] = array(
    '#type' => 'select',
    '#title' => t('User Location'),
    '#default_value' => theme_get_setting('tm_value_user_location'),
    '#options' => array (
      '0' => t('Use User Settings'),
	    '1' => t('Use Default User Location'),
    ),
  );

  $form['advansed_theme_settings']['tm_value_default_bigmap_location'] = array(
    '#type' => 'textfield',
    '#title' => t('Default Big Map Center Location'),
    '#default_value' => theme_get_setting('tm_value_default_bigmap_location')
  );

   $form['advansed_theme_settings']['tm_value_bigmap_location'] = array(
    '#type' => 'select',
    '#title' => t('Big Map Center Location'),
    '#default_value' => theme_get_setting('tm_value_bigmap_location'),
    '#options' => array (
      '0' => t('Auto'),
	    '1' => t('Use Default Big Map Center Location'),
	    '2' => t('Use User Settings'),
    ),
  );

  $types = node_type_get_names();
  $form['advansed_theme_settings']['tm_value_13'] = array(
    '#type' => 'select',
    '#title' => t('Button "Post your Ad!"'),
    '#default_value' => theme_get_setting('tm_value_13'),
    '#options' => array('' => 'None') + $types
  );

  $form['advansed_theme_settings']['colors'] = array(
    '#type' => 'fieldset',
    '#title' => t('Colors'),
  );

  $form['advansed_theme_settings']['colors']['header'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header'),
    '#collapsible' => TRUE,
		'#collapsed' => TRUE,
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Background'),
    '#default_value' => theme_get_setting('tm_value_color_header_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_search_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Search Background'),
    '#default_value' => theme_get_setting('tm_value_color_header_search_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('tm_value_color_header_text'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('tm_value_color_header_link'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover'),
    '#default_value' => theme_get_setting('tm_value_color_header_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_button'] = array(
    '#type' => 'textfield',
    '#title' => t('Button'),
    '#default_value' => theme_get_setting('tm_value_color_header_button'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_button_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background'),
    '#default_value' => theme_get_setting('tm_value_color_header_button_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_button_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Hover'),
    '#default_value' => theme_get_setting('tm_value_color_header_button_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['header']['tm_value_color_header_button_background_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Hover'),
    '#default_value' => theme_get_setting('tm_value_color_header_button_background_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );






  $form['advansed_theme_settings']['colors']['content'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content'),
    '#collapsible' => TRUE,
		'#collapsed' => TRUE,
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Background'),
    '#default_value' => theme_get_setting('tm_value_color_content_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('tm_value_color_content_text'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('tm_value_color_content_link'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_button'] = array(
    '#type' => 'textfield',
    '#title' => t('Button'),
    '#default_value' => theme_get_setting('tm_value_color_content_button'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_button_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background'),
    '#default_value' => theme_get_setting('tm_value_color_content_button_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_button_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_button_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['tm_value_color_content_button_background_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_button_background_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );


  $form['advansed_theme_settings']['colors']['content']['dark'] = array(
    '#type' => 'fieldset',
    '#title' => t('Dark Regions'),
    '#collapsible' => TRUE,
		'#collapsed' => TRUE,
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Background'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_text'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_link'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_button'] = array(
    '#type' => 'textfield',
    '#title' => t('Button'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_button'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_button_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_button_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_button_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_button_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['content']['dark']['tm_value_color_content_dark_button_background_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Hover'),
    '#default_value' => theme_get_setting('tm_value_color_content_dark_button_background_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );






  $form['advansed_theme_settings']['colors']['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer'),
    '#collapsible' => TRUE,
		'#collapsed' => TRUE,
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Background'),
    '#default_value' => theme_get_setting('tm_value_color_footer_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('tm_value_color_footer_text'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('tm_value_color_footer_link'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover'),
    '#default_value' => theme_get_setting('tm_value_color_footer_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_button'] = array(
    '#type' => 'textfield',
    '#title' => t('Button'),
    '#default_value' => theme_get_setting('tm_value_color_footer_button'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_button_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background'),
    '#default_value' => theme_get_setting('tm_value_color_footer_button_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_button_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Hover'),
    '#default_value' => theme_get_setting('tm_value_color_footer_button_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['footer']['tm_value_color_footer_button_background_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Hover'),
    '#default_value' => theme_get_setting('tm_value_color_footer_button_background_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

  $form['advansed_theme_settings']['colors']['copyright'] = array(
    '#type' => 'fieldset',
    '#title' => t('Copyright'),
    '#collapsible' => TRUE,
		'#collapsed' => TRUE,
  );
  $form['advansed_theme_settings']['colors']['copyright']['tm_value_color_copyright_background'] = array(
    '#type' => 'textfield',
    '#title' => t('Background'),
    '#default_value' => theme_get_setting('tm_value_color_copyright_background'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['copyright']['tm_value_color_copyright_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('tm_value_color_copyright_text'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['copyright']['tm_value_color_copyright_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('tm_value_color_copyright_link'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['colors']['copyright']['tm_value_color_copyright_hover'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover'),
    '#default_value' => theme_get_setting('tm_value_color_copyright_hover'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

}
