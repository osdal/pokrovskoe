<?php global $base_url, $user; 
if (arg(1)) {
  $acc = user_load(arg(1));
}
// if (empty($acc->data['pinboard']['unfollowers'])) { $acc->data['pinboard']['unfollowers'] = 0; }
// $destination = drupal_get_destination();
// $field_twitter = strip_tags(render($user_profile['field_twitter']));

// $iurl = $base_url.'/'.drupal_get_path('theme','ts').'/';
// $field_activetuts = strip_tags(render($user_profile['field_activetuts']));
// $field_aetuts = strip_tags(render($user_profile['field_aetuts']));
// $field_audiotuts = strip_tags(render($user_profile['field_audiotuts']));
// $field_behance = strip_tags(render($user_profile['field_behance']));
// $field_cgtuts = strip_tags(render($user_profile['field_cgtuts']));
// $field_creattica = strip_tags(render($user_profile['field_creattica']));
// $field_deviantart = strip_tags(render($user_profile['field_deviantart']));
// $field_digg = strip_tags(render($user_profile['field_digg']));
// $field_dribbble = strip_tags(render($user_profile['field_dribbble']));
// $field_facebook = strip_tags(render($user_profile['field_facebook']));
// $field_flickr = strip_tags(render($user_profile['field_flickr']));
// $field_forrst = strip_tags(render($user_profile['field_forrst']));
// $field_freelanceswitch = strip_tags(render($user_profile['field_freelanceswitch']));
// $field_github = strip_tags(render($user_profile['field_github']));
// $field_googlep = strip_tags(render($user_profile['field_googlep']));
// $field_last_fm = strip_tags(render($user_profile['field_last_fm']));
// $field_linkedin = strip_tags(render($user_profile['field_linkedin']));
// $field_mobiletuts = strip_tags(render($user_profile['field_mobiletuts']));
// $field_myspace = strip_tags(render($user_profile['field_myspace']));
// $field_nettuts = strip_tags(render($user_profile['field_nettuts']));
// $field_phototuts = strip_tags(render($user_profile['field_phototuts']));
// $field_psdtuts = strip_tags(render($user_profile['field_psdtuts']));
// $field_reddit = strip_tags(render($user_profile['field_reddit']));
// $field_tumblr = strip_tags(render($user_profile['field_tumblr']));
// $field_twitter = strip_tags(render($user_profile['field_twitter']));
// $field_vectortuts = strip_tags(render($user_profile['field_vectortuts']));
// $field_vimeo = strip_tags(render($user_profile['field_vimeo']));
// $field_webdesigntuts = strip_tags(render($user_profile['field_webdesigntuts']));
// $field_youtube = strip_tags(render($user_profile['field_youtube']));
// 
// if ($field_activetuts.$field_aetuts.$field_audiotuts.$field_behance.$field_cgtuts.
//     $field_creattica.$field_deviantart.$field_digg.$field_dribbble.$field_facebook.
//     $field_flickr.$field_forrst.$field_freelanceswitch.$field_github.$field_googlep.
//     $field_last_fm.$field_linkedin.$field_mobiletuts.$field_myspace.$field_nettuts.
//     $field_phototuts.$field_psdtuts.$field_reddit.$field_tumblr.$field_twitter.
//     $field_vectortuts.$field_vimeo.$field_webdesigntuts.$field_youtube)
// ts_usr_blk1(ts_prdnode_blk(
//   '<div class="pgusersoc">'.
//   ($field_activetuts ? '<a href="http://active.tutsplus.com/author/'.$field_activetuts.'"><img src="'.$iurl.'soc/activetuts.png" /></a>' : '').
//   ($field_aetuts ? '<a href="http://ae.tutsplus.com/author/'.$field_aetuts.'"><img src="'.$iurl.'soc/aetuts.png" /></a>' : '').
//   ($field_audiotuts ? '<a href="http://audio.tutsplus.com/author/'.$field_audiotuts.'"><img src="'.$iurl.'soc/audiotuts.png" /></a>' : '').
//   ($field_behance ? '<a href="http://behance.net/'.$field_behance.'"><img src="'.$iurl.'soc/behance.png" /></a>' : '').
//   ($field_cgtuts ? '<a href="http://cg.tutsplus.com/author/'.$field_cgtuts.'"><img src="'.$iurl.'soc/cgtuts.png" /></a>' : '').
//   ($field_creattica ? '<a href="http://creattica.com/creatives/@/'.$field_creattica.'"><img src="'.$iurl.'soc/creattica.png" /></a>' : '').
//   ($field_deviantart ? '<a href="http://'.$field_deviantart.'.deviantart.com/"><img src="'.$iurl.'soc/deviantart.png" /></a>' : '').
//   ($field_digg ? '<a href="http://digg.com/users/'.$field_digg.'"><img src="'.$iurl.'soc/digg.png" /></a>' : '').
//   ($field_dribbble ? '<a href="http://dribbble.com/'.$field_dribbble.'"><img src="'.$iurl.'soc/dribbble.png" /></a>' : '').
//   ($field_facebook ? '<a href="http://www.facebook.com/people/@/'.$field_facebook.'"><img src="'.$iurl.'soc/facebook.png" /></a>' : '').
//   ($field_flickr ? '<a href="http://www.flickr.com/photos/'.$field_flickr.'"><img src="'.$iurl.'soc/flickr.png" /></a>' : '').
//   ($field_forrst ? '<a href="http://forrst.com/people/'.$field_forrst.'"><img src="'.$iurl.'soc/forrst.png" /></a>' : '').
//   ($field_freelanceswitch ? '<a href="http://directory.freelanceswitch.com/f/'.$field_freelanceswitch.'"><img src="'.$iurl.'soc/freelanceswitch.png" /></a>' : '').
//   ($field_github ? '<a href="http://github.com/'.$field_github.'"><img src="'.$iurl.'soc/github.png" /></a>' : '').
//   ($field_googlep ? '<a href="http://plus.google.com/'.$field_googlep.'"><img src="'.$iurl.'soc/googleplus.png" /></a>' : '').
//   ($field_last_fm ? '<a href="http://last.fm/user/'.$field_last_fm.'"><img src="'.$iurl.'soc/lastfm.png" /></a>' : '').
//   ($field_linkedin ? '<a href="'.$field_linkedin.'"><img src="'.$iurl.'soc/linkedin.png" /></a>' : '').
//   ($field_mobiletuts ? '<a href="http://mobile.tutsplus.com/author/'.$field_mobiletuts.'"><img src="'.$iurl.'soc/mobiletuts.png" /></a>' : '').
//   ($field_myspace ? '<a href="http://www.myspace.com/'.$field_myspace.'"><img src="'.$iurl.'soc/myspace.png" /></a>' : '').
//   ($field_nettuts ? '<a href="http://net.tutsplus.com/author/'.$field_nettuts.'"><img src="'.$iurl.'soc/nettuts.png" /></a>' : '').
//   ($field_phototuts ? '<a href="http://photo.tutsplus.com/author/'.$field_phototuts.'"><img src="'.$iurl.'soc/phototuts.png" /></a>' : '').
//   ($field_psdtuts ? '<a href="http://psd.tutsplus.com/author/'.$field_psdtuts.'"><img src="'.$iurl.'soc/psdtuts.png" /></a>' : '').
//   ($field_reddit ? '<a href="http://reddit.com/user/'.$field_reddit.'"><img src="'.$iurl.'soc/reddit.png" /></a>' : '').
//   ($field_tumblr ? '<a href="http://'.$field_tumblr.'.tumblr.com/"><img src="'.$iurl.'soc/tumblr.png" /></a>' : '').
//   ($field_twitter ? '<a href="http://twitter.com/'.$field_twitter.'"><img src="'.$iurl.'soc/twitter.png" /></a>' : '').
//   ($field_vectortuts ? '<a href="http://vector.tutsplus.com/author/'.$field_vectortuts.'"><img src="'.$iurl.'soc/vectortuts.png" /></a>' : '').
//   ($field_vimeo ? '<a href="http://vimeo.com/'.$field_vimeo.'"><img src="'.$iurl.'soc/vimeo.png" /></a>' : '').
//   ($field_webdesigntuts ? '<a href="http://webdesign.tutsplus.com/author/'.$field_webdesigntuts.'"><img src="'.$iurl.'soc/webdesigntuts.png" /></a>' : '').
//   ($field_youtube ? '<a href="http://www.youtube.com/user/'.$field_youtube.'"><img src="'.$iurl.'soc/youtube.png" /></a>' : '').
//   '</div>'
// , t('Social profiles')));

// $data_options = sharethis_get_options_array();
// ts_usr_blk2(ts_prdnode_blk(
//   render($user_profile['user_picture']).
//   '<h3>'.$acc->name.'</h3>'.
//   '<div class="u_date1">'.t('Member Since').': <b>'.format_date($acc->created,'short2').'</b></div>'.
//   '<div class="u_date2">'.t('Last Access').': <b>'.format_date($acc->access,'short2').'</b></div>'.
//   (user_access('access user sales', $acc) ? '<div class="u_port">'.l('View Portfolio', 'user/'.$acc->uid.'/portfolio').'</div>' : '').
//   '<div class="clr">&nbsp;</div>'.
//   '<div class="prd-fivestar">'.render($user_profile['field_rating_votes']).'</div>'.
//   '<div class="field prd-comments field-label-above"><div class="field-label">'.t('Followers').':&nbsp;<i id="ts_helper_count_follow_'.$acc->uid.'">('.ts_helper_count_follow($acc->uid).')</i></div><div class="field-items"><div class="field-item">'.(($user->uid and $acc->uid != $user->uid) ? '<div class="u_portt">'.(ts_helper_isfollow($acc->uid) ? l('Unfollow', 'unfollow/'.$acc->uid, array('attributes' => array('class' => array('use-ajax', 'follow-'.$acc->uid)))) : l('Follow', 'follow/'.$acc->uid, array('attributes' => array('class' => array('use-ajax', 'follow-'.$acc->uid)))) ).'</div>' : '').'</div></div></div>'.
//   '<div class="sharethis-buttons">'.
//   sharethis_get_button_HTML($data_options, url('user/'.$acc->uid, array('absolute' => TRUE)), $acc->name).
//   '</div>'.
//   '<div class="clr">&nbsp;</div>'.
//   'tab_menu'
// ));

?>
<div class="row padding-10-0">  
<?php if ($field_phone = strip_tags(render($user_profile['field_phone']))) print '<div class="col-md-3 col-sm-3"><div class="field prd-comments field-label-inline"><div class="field-label"><i class="fa fa-phone-square"></i>&nbsp;</div><div class="field-items"><div class="field-item">'. $field_phone .'</div></div></div></div>'; ?>
<?php if (strip_tags(render($user_profile['field_show_e_mail']))) print '<div class="col-md-4 col-sm-4"><div class="field prd-comments field-label-inline"><div class="field-label"><i class="fa fa-envelope"></i>&nbsp;</div><div class="field-items"><div class="field-item"><a href="mailto:'. $acc->mail .'">'. $acc->mail .'</a></div></div></div></div>'; ?>
<?php if ($privatemsg_send_new_message = (render($user_profile['privatemsg_send_new_message']))) print '<div class="col-md-5 col-sm-5"><div class="field prd-comments field-label-inline"><div class="field-label"><i class="fa fa-envelope-o"></i>&nbsp;</div><div class="field-items"><div class="field-item">'. $privatemsg_send_new_message .'</div></div></div></div>'; ?>
</div>
<?php if ($locations = (render($user_profile['locations']))) print '<div class="row padding-10-0 useracc"><div class="col-md-12 col-sm-12"><div class="field prd-comments field-label-inline"><div class="field-label"><i class="fa fa-map-marker"></i>&nbsp;</div><div class="field-items"><div class="field-item">'. $locations .'</div></div></div></div></div>'; ?>
<?php if ($field_rating = (render($user_profile['field_rating']))) flatclassifieds_fivestars_user($field_rating); ?>
<hr />
<?php $data_options = sharethis_get_options_array(); print theme('sharethis', array('data_options' => $data_options, 'm_path' => url('user/'.$acc->uid, array('absolute' => TRUE)), 'm_title' => $acc->name)); ?>
<?php 
unset($user_profile['user_picture']);
unset($user_profile['summary']);
unset($user_profile['field_phone']);
unset($user_profile['field_show_e_mail']);
unset($user_profile['privatemsg_send_new_message']);
unset($user_profile['summary']);
// if ($out = render($user_profile)) {
//   print $out; 
// } else {
//   print '<p>&nbsp;</p><center><h1>'.t('No Info').'</h1></center><p>&nbsp;</p>';
// }
?>
<div class="clr"></div>
<?php 
//l('Unfollow', 'unfollow/'.$acc->uid)
//unset($user_profile['field_about']);
//unset($user_profile['user_picture']);
//unset($user_profile['field_name']);
//unset($user_profile['userpoints']);
//unset($user_profile['field_location']);
//unset($user_profile['field_url']);
//unset($user_profile['summary']);
//unset($user_profile['simplenews']);
//unset($user_profile['field_birthdayu']);
//

//print '<div class="user_profile_main"><pre>'. check_plain(print_r($user_profile, 1)) .'</pre></div>'; 

?>