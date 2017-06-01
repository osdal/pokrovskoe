<?php  
$icon = flatclassifieds_get_term_icon($fields['tid']->content);
flatclassifieds_biggooglemap_markers('
{
  latLng:['.$fields['latitude']->content.','.$fields['longitude']->content.'], 
  options:{icon:"'.flatclassifieds_biggooglemap_icon().'"}
},');

flatclassifieds_biggooglemap_overlays('
{
  latLng:['.$fields['latitude']->content.','.$fields['longitude']->content.'], 
  data: \'<div class="map_info_ovr_holder"><div class="map_info_ovr">'.$fields['field_image_ca']->content.'<a href="'.url('node/'.$fields['nid']->content).'"><div class="map_info_ovr_txt"><div class="map_info_star">'.str_replace("\n", '', $fields['field_rating']->content).'</div><div class="map_info_ovr_price">'.flatclassifieds_format_price($fields['field_price']->content, $fields['field_currency']->content).'</div>'.$fields['title']->content.'</div></a><div class="arr"></div><div class="close"></div></div></div>\',
  options:{ content:\'<div class="map_ico_ovr">'.$icon.'</div>\',offset:{y:-70,x:-31}}
},');
print($fields['nid']->content);