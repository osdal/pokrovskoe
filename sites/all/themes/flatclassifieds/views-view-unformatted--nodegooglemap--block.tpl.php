<?php
$out = '';
foreach ($rows as $id => $row) {
  $out .= $row;
}
if ($out) {
flatclassifieds_is_googlemap(1);
print '<div id="NodeGoogleMap" style="width:"100%"; height:"350px"></div>';
print '<script type="text/javascript">';
print '
var NodemapDiv, Nodemap;
jQuery(document).ready(function($) {
NodemapDiv = $("#NodeGoogleMap");
NodemapDiv.width("100%").height("350px").gmap3({
marker:{values:['.flatclassifieds_nodegooglemap_markers(FALSE,TRUE).']},
overlay:{
  values:['.flatclassifieds_nodegooglemap_overlays(FALSE,TRUE).'],
},
map:{
  options:{
    zoom: 15,
    minZoom: 4,
    draggable: false,
    scrollwheel: false
  }
}
});
});
';
print '</script>';
}
?>
