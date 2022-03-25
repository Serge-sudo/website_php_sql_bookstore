<?php 
function sql($str,$bool){
$db = mysqli_connect("localhost","root","","base");
$sql=$str;
$result = mysqli_query($db,$sql);
if($bool == TRUE){
$zan = mysqli_fetch_all($result , MYSQLI_ASSOC);
return $zan;
}
}
?>