<?php 
if(strtolower($_POST['Login']) == "admin" and strtolower($_POST['Pass']) == "admin"){
header("Location:Admin.php");
}
else{
header("Location:Index.php?err=1");
}
 ?> 