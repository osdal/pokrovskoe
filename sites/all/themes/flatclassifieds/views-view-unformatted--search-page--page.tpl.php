<?php 
$out = '';
foreach ($rows as $id => $row) { 
  $out .= '<div class="col-md-4 col-sm-4 col-xs-6">'.$row.'</div>';
} 
if ($out)
  print '<div class="row calc_h content_classifieds">'.$out.'</div>';
?>
