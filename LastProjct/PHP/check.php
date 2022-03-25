<?php 
	include("sqldb.php");

	if($_POST['doing'] == 'INSERT'){
		header("Location:Admin.php?type=INSERT");
		exit;
	}
	if($_POST['doing'] == 'befUPDATE'){
		header("Location:Admin.php?type=befUPDATE");
		exit;
	}
	if($_POST['doing'] == 'DELETE'){
		header("Location:Admin.php?type=DELETE");
		exit;
	}
	if($_GET['Idfordel'] != null){
		sql("DELETE FROM `products` WHERE `id` = ".$_GET['Idfordel'],FALSE);
		unlink("../Photo/img".$_GET['Idfordel'].".jpg");
		header("Location:Admin.php?res=1");
		exit;
	}
	if($_GET['Idforup'] != null){
		header("Location:Admin.php?type=UPDATE&upid=".$_GET['Idforup']);
		exit;
	}
	$Name = $_POST['Name'];
	$Description = $_POST['Description'];
	$File = $_FILES['File']['name'];
	$Price = $_POST['Price'];
	$Type = $_POST['Type'];
	$date = date("d.m.Y");
	if($Name == "" or $Description =="" or ($_GET['t'] == "INSERT" and $File == "") or $Price == "" or $Type == ""){
	 	header("Location:Admin.php?res=2");
	 	exit;
	}
	if($_GET['t'] == "UPDATE"){

		if($_FILES['File']['name']){
	sql("UPDATE `products` set `name` = '$Name',`description` = '$Description',`img_src` =".'img'.$_GET['upid'].'.jpg'.",`price` = '$Price',`date` = '$date',`type` = '$Type' WHERE `id` = ".$_GET['upid'],false);
	move_uploaded_file($_FILES['File']['tmp_name'],"../Photo/".$File);
	 rename("../Photo/".$File,"../Photo/img".$_GET['upid'].".jpg");
	}else{
	sql("UPDATE `products` set `name` = '$Name',`description` = '$Description',`price` = '$Price',`date` = '$date',`type` = '$Type' WHERE `id` = ".$_GET['upid'],false);
	}
		header("Location:Admin.php?res=1");
	}
	elseif($_GET['t'] == "INSERT"){
	sql("INSERT INTO `products`(`name`,`description`,`img_src`,`price`,`date`,`type`) VALUES('$Name','$Description','$File','$Price','$date','$Type')",FALSE);
	 $n = sql("SELECT `id` FROM `products` WHERE `name` = '$Name'",true);
	move_uploaded_file($_FILES['File']['tmp_name'],"../Photo/".$File);
	 rename("../Photo/".$File,"../Photo/img".$n[0]['id'].".jpg");

	sql("UPDATE `products` SET `img_src` = ".'\'img'.$n[0]['id'].'.jpg\''." WHERE `id` = ".$n[0]['id'],FALSE);

	 	header("Location:Admin.php?res=1");
	}
?>
	

