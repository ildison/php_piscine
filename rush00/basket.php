<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css"  href="style.css">
	<title>Basket</title>
</head>
<body>
	<header>
		<div class="box over_hidden">
			<a href="index.php">
				<div class="logo">
					<h4>Best internet shop</h4>
				</div>
			</a>
			<div class="buttons
			<?
				session_start();
				if ($_SESSION["login"])
					echo "hidden";
			?>">
				<form method="post" name="create.php" action="create.php">
					<input type="text" name="login" placeholder="login...">
					<input type="submit" name="submit" value="login"><br>
					<input type="password" name="passwd" placeholder="password..."><br>
					<a href="register.php">or register...</a>
	
				</form>
			</div>
			<div class=basket>
				<a href="basket.php">
					<img src="img/basket.png" width="60px" alt="basket">
				</a>
			</div>
		</div>
	</header>
	<div class="box over_hidden">
		<h2>Basket</h2>
		<?php
			if (($basket = $_SESSION["basket"]))
			{
				foreach ($basket as $key => $value) {
					print_r($value);
					echo "good - " . $value["goods"] . " price - " . $value["price"] . " count - " . $value["count"];
				}
			}
		?>
	</div>
</body>
</html>