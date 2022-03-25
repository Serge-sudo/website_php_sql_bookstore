<?php 
include("sqldb.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title>BookShoop</title>
		<link rel="stylesheet" href="Adminstyle.css">
</head>
<body>

	<form action="check.php?t=<?php echo $_GET['type']."&upid=".$_GET['upid']; ?>" method="post" class="Adminka" enctype="multipart/form-data">
	<h1>Admin Panel</h1>
	<h3 id="Res" style="color:red"><?php 
	if($_GET['res'] == 1) echo "Успешно Сделано!";
	elseif($_GET['res'] == 2) echo "Ошибка при Обработке!";
	 ?></h3>
	<?php  if ($_GET['type'] == null):?>
	<h3>What do you want to do?</h3>
	<select size="3" name="doing" style="width: 500px;">
    <option value="INSERT" selected>INSERT</option>
    <option value="befUPDATE">UPDATE</option>
    <option value="DELETE">DELETE</option>
   </select>
	<?php elseif ($_GET['type']=="INSERT"): ?>
	<input name="Name" type="text" placeholder="Name"><br><br>
	<input name="Price" type="text" placeholder="Price"><br><br>
	<input  name="File" type="file" placeholder="File"><br><br>
	<input  name="Type" type="text" placeholder="Type"><br><br>
	<textarea name="Description" type="text" placeholder="Description"></textarea>
	<?php elseif ($_GET['type']=="DELETE"): ?>
		<?php $actitem = sql("SELECT * FROM `products` ORDER BY `id` DESC",true) ?>
		<?php echo "<h2 style='color:red'>Choose Element for Delete</h2>"?>
		<?php foreach($actitem as $item) { ?>
			<a href="check.php?Idfordel=<?php echo $item['id']?>" class="del"><article>
				<div class="imgarea"><img src="../Photo/<?php echo $item['img_src'] ?>" alt=""></div>
				<div class="namearea"><h4><?php echo $item['name']; ?></h4>
				</div>
				<h5><?php echo $item['price'] ?> руб.</h5>
			</article>
			</a>		
		<?php } ?>
	<?php elseif ($_GET['type']=="befUPDATE"): ?>
		<?php $actitem = sql("SELECT * FROM `products` ORDER BY `id` DESC",true) ?>
		<?php echo "<h2 style='color:red'>Choose Element for Update</h2>"?>
		<?php foreach($actitem as $item) { ?>
			<a href="check.php?Idforup=<?php echo $item['id']?>" class="del"><article>
				<div class="imgarea"><img src="../Photo/<?php echo $item['img_src'] ?>" alt=""></div>
				<div class="namearea"><h4><?php echo $item['name']; ?></h4>
				</div>
				<h5><?php echo $item['price'] ?> руб.</h5>
			</article>
			</a>		
		<?php } ?>
	<?php elseif ($_GET['type'] == "UPDATE"): ?>
		<?php 
		$uparr = sql("SELECT * FROM `products` WHERE `id` = ".$_GET['upid'],true);
		?>
		<input name="Name" type="text" placeholder="Name" value="<?php echo $uparr[0]['name'] ?>"><br><br>
		<input name="Price" type="text" placeholder="Price" value="<?php echo $uparr[0]['price'] ?>"><br><br>
		<input  name="File" type="file" placeholder="File"><br><br>
		<input  name="Type" type="text" placeholder="Type" value="<?php echo $uparr[0]['type'] ?>"><br><br>
		<textarea name="Description" type="text"   placeholder="Description"><?php echo $uparr[0]['description'] ?></textarea>
	<? endif; ?>
	<br>
	<input type="submit" name="sub" id="None" value="Send">
	<br>
	<a href="Index.php"><img src="../Photo/back.ico" alt=""> Go Back</a>
	</form>

<nav style="clear: both"></nav>
</body>
</html>
