<?php 
include("sqldb.php");
$id=$_GET['id'];
$art=sql("SELECT * FROM `products` WHERE `id` = $id",TRUE);
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BookShoop</title>
		<link rel="stylesheet" href="../Style/Style.css">
		<link rel="shortcut icon" href="../Photo/icon.ico" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../Script/Script.js"></script>
		<style type="text/css">
		.menu li:nth-child(3) a {
		border-bottom: 3px solid #4285f4;
		}
		.container img{
			max-width: 400px;
		}
		</style>
	</head>
	<body>
		<main>
			<?php include("Header.php") ;?>
			<?php include("Menu.php") ;?>
		<div class="container">
			<img style="float: left" src="../Photo/<?php  echo $art[0]['img_src']; ?>" alt="Foto">
			<h1><?php echo $art[0]['name']; ?></h1>
			<h4 id="price"><?php echo $art[0]['price']; ?> руб</h4>
			<h3>Жанр՝ <?php echo $art[0]['type']; ?></h3>
			<p><?php echo  $art[0]['description']; ?></p>
			<span style="float: right;"><?php echo $art[0]['date']; ?></span><br>
			<hr size="5px" style="background-color:black;width: 100%;">
			 <div class="Same">
			<?php 
			$same = sql("SELECT * FROM `products` WHERE `type` = '".$art[0]['type']."' AND `id` != $id  LIMIT 5",true);
				if(count($same) != 0)
					echo "<h2>Похожие книги</h2>"
			 ?>
			<?php foreach($same as $item){?>
			<a href="Book.php?id=<?php echo $item['id']?>"><article>
				<div class="imgarea"><img src="../Photo/<?php echo $item['img_src'] ?>" alt=""></div>
				<div class="namearea"><h4><?php echo $item['name']; ?></h4>
				</div>
				<h5><?php echo $item['price'] ?> руб.</h5>
			</article>
			</a>
			<?php  } ?>
			<nav style="clear:both"></nav>
		</div>
			<nav style="clear: both"></nav>
		</div>
		<?php include("Footer.php"); ?>
		</main>
			

</body>
</html>