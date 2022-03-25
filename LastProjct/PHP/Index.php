<?php include("sqldb.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BookShoop</title>
		<link rel="stylesheet" href="../Style/Style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../Script/Script.js"></script>
		<link rel="shortcut icon" href="../Photo/icon.ico" type="image/x-icon">
		<style type="text/css">
        menu li:nth-child(1) a {
        border-bottom: 3px solid #4285f4;
        }
    </style>
	</head>
	<body>
		<main>
			<div class="main">
			<?php include("Header.php") ;?>
			<?php include("Menu.php");?>
		<div class="container">
			<?php $zan = sql("SELECT * FROM `products` ORDER BY `id` DESC",TRUE); ?>
			<?php foreach($zan as $item){?>
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
		<?php include("Footer.php"); ?>
		</main>
</body>
</html>