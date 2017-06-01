<?php
//width("100%").height("500px").
$out = '';
foreach ($rows as $id => $row) {
  $out .= $row;
}
if ($out) {
switch(theme_get_setting('tm_value_bigmap_location')) {
  case 1:
    $bml = theme_get_setting('tm_value_default_bigmap_location');
    if (!$bml) {
      $l = flatclassifieds_helper_detect_location($_SERVER['REMOTE_ADDR']);
      if (isset($l['latitude'])) {
        $bml = $l['latitude'].','.$l['longitude'];
      }
    }
    break;
  case 2:
    $l = flatclassifieds_helper_detect_location($_SERVER['REMOTE_ADDR']);
    if (isset($l['latitude'])) {
      $bml = $l['latitude'].','.$l['longitude'];
    } else {
      $bml = theme_get_setting('tm_value_default_bigmap_location');
    }
    break;
  default:
    $bml = '';
}
//drupal_set_message(theme_get_setting('tm_value_bigmap_location').'--'.$bml);

flatclassifieds_is_googlemap(1);
print '<div id="BigGoogleMap"></div>';
print '<script type="text/javascript">';
if ($bml) print 'var latlng = new google.maps.LatLng('.$bml.');';
print '
var mapDiv,
			map,
			infobox;
jQuery(document).ready(function($) {
mapDiv = $("#BigGoogleMap");
mapDiv.gmap3({
marker:{values:['.flatclassifieds_biggooglemap_markers(FALSE,TRUE).']},
overlay:{
  values:['.flatclassifieds_biggooglemap_overlays(FALSE,TRUE).'],
  events:{
    click: function(overlay, event, context){
      var map = $(this).gmap3("get");
      map.panTo(overlay.getPosition());
			var ibOptions = {
				pixelOffset: new google.maps.Size(-125, -88),
				alignBottom: true
			};
			infobox.setOptions(ibOptions)
			infobox.setContent(context.data);
			infobox.open(map,overlay);
			// if map is small
			var iWidth = 260;
			var iHeight = 300;
			if(($(this).width() / 2) < iWidth ){
			  var offsetX = iWidth - ($(this).width() / 2);
				map.panBy(offsetX,0);
			}
			if(($(this).height() / 2) < iHeight ){
				var offsetY = -(iHeight - ($(this).height() / 2));
				map.panBy(0,offsetY);
			}
		}
	}
},
map:{
  options:{
    zoom: 6,
    minZoom: 4,
    '.($bml ? 'center: latlng,' : '').'
    draggable: false,
    scrollwheel: false
  }
}
});
infobox = new InfoBox({
  pixelOffset: new google.maps.Size(-50, -65),
	closeBoxURL: \'\',
	enableEventPropagation: true
});
mapDiv.delegate(\'.map_info_ovr .close\',\'click\',function () {
	infobox.close();
});
});
';
print '</script>';
}
?>
