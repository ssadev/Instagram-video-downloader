<?php
if(isset($_GET['src'])){
$type = $_GET['type'];

function download($f_location, $f_name){
  $file = uniqid() .".".$type;

  file_put_contents($file,file_get_contents($f_location));

  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Length: ' . filesize($file));
  header('Content-Disposition: attachment; filename=' . basename($f_name));

  readfile($file);
unlink($file);
}

if(download($_GET['src'], $_GET['name']."Sarj991.".$type)){
header("location: index.php");
}

}
?>