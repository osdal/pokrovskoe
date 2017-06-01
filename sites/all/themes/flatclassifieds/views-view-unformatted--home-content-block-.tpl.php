<?php 
$out = '';
foreach ($rows as $id => $row) { 
  $out .= '<div class="col-md-3 col-sm-4 col-xs-12">'.$row.'</div>';
} 
if ($out)
  print '<div class="row calc_h content_classifieds">'.$out.'</div>';
?>