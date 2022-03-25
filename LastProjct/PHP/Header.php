<header>
	<a href="Index.php"><img src="../Photo/LG.png" width="500px" alt="Logo"></a>
	<form action="checklogin.php" class="Form" method="post">
		<span style="color:red;float: right;"><?php
		if($_GET['err']==1) echo "Неправильный Логин/Пароль"
		  ?></span><br>
		<input type="text" name="Login" placeholder="Login is admin"><br><br><br>
		<input type="password" name="Pass" placeholder="Password is admin"><br><br><br>
		<input type="submit" value="Войти">
	</form>
</header>