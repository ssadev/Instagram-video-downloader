<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
<div class="container col-8">

<form action="" style="margin-top: 20px">

<div class="container col-sm-6 alert alert-info text-center"><p style="font-size: 40px; display: block">Instagram Video Download</p></div>

<div clsss="form-inline">
<input class="form-control container" placeholder="Enter Instagram video link" name="url">
</br>

<input type="submit" class="btn btn-outline-primary container" value="submit" >

</div>


</form>
</div>
<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');

if(isset($_GET['url'])){
$url = $_GET['url'] ;
//"https://www.instagram.com/p/Bs8WLzegIA4/?utm_source=ig_web_copy_link";





// get DOM from URL or file
$html = file_get_html($url);

foreach($html->find('meta') as $e){
     if($e->property == "og:title"){
$title = $e->content;
//echo "<b>Post Icon : <b> <img src='".$image. "' /></br>";

}
}


foreach($html->find('body') as $e){

$res = $e->innertext;
 $res = htmlspecialchars($res);

echo "</br>";



}

preg_match('/video_url(.*.)video_view/', $res, $src);

$srcs = substr($src[1], 13);

$src = strrev($srcs);
$src = substr($src, 13);
$src = strrev($src);



?>

<div class="container alert alert-primary"><?php echo  $title ;?></div>

 <iframe src="<?php echo $src;?>" width= "100%" height= "500"></iframe> 

<?php
$name = preg_replace('/^(\W+)/', '', $title);
$name = preg_replace('/(\W+)/', '-', $name);

?>
<a href="download.php?src=<?php echo $src; ?>&name=<?php echo $name; ?>" class="btn btn-lg btn-success" >Download Now</a>

<!--

<!--
<div style="width:90%; height: 400px; margin: 5%;background : url('demo.gif') no-repeat; background-position: center; background-size: cover;">
<h1 class="text-danger">How To Download?</h1></div>-->
<?php

}
?>
<script src="/jquery.js"> </script>
