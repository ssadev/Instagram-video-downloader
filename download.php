<?php
if(_Download($_GET['src'], $_GET['name']."Sarj991.mp4")){
header("location: index.php");
}

function _Download($f_location, $f_name){
  $file = uniqid() . '.mp4';

  file_put_contents($file,file_get_contents($f_location));

  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Length: ' . filesize($file));
  header('Content-Disposition: attachment; filename=' . basename($f_name));

  readfile($file);
unlink($file);
}



?>