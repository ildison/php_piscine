<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
	<header>
		<div class="box over_hidden">
			<a href="index.php">
				<div class="logo">
					<h4>Best internet shop</h4>
				</div>
			</a>
			<div class="buttons">
				<form method="post" name="create.php" action="login.php">
					<input type="text" name="login" placeholder="login...">
					<input type="submit" name="submit" value="login"><br>
					<input type="password" name="passwd" placeholder="password..."><br>
				</form>
			</div>
			<div class=basket>
				<a href="basket.html">
					<img src="img/basket.png" width="60px" alt="basket">
				</a>
			</div>
		</div>
	</header>
	<div class="box center padding">
	<form method="post" name="modif.php" action="create.php">
		Username: <input type="text"  name="login" value="">
		<br />
		Password: <input  type="text" name="passwd" value="">
		<br />
		<input  type="submit" name="submit" value="registration">
	</div>
</form>
</body>
</html>