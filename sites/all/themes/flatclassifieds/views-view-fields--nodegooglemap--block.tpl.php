<?php  
$icon = flatclassifieds_get_term_icon($fields['tid']->content);
flatclassifieds_nodegooglemap_markers('
{
  latLng:['.$fields['latitude']->content.','.$fields['longitude']->content.'], 
  options:{icon:"'.flatclassifieds_biggooglemap_icon().'"}
},');

flatclassifieds_nodegooglemap_overlays('
{
  latLng:['.$fields['latitude']->content.','.$fields['longitude']->content.'], 
  options:{ content:\'<div class="map_ico_ovr">'.$icon.'</div>\',offset:{y:-70,x:-31}}
},');
print($fields['longitude']->content);