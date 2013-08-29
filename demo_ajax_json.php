<?php
$query=$_GET['val'];
$query1=urlencode($query);
$query2 =htmlentities($query1);
$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query2;

$body = file_get_contents($url);
//$json = json_decode($body);
echo $body;



?>

