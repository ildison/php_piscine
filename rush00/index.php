<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css"  href="style.css">
	<link rel="stylesheet" type="text/css"  href="style.css">
	<title>Accessories for gadgets</title>
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
				<form method="post" name="create.php" action="login.php">
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
	<div class="header">
		<div class="box">
			<h1 contenteditable="true" class=headline>Accessories for gadgets</h1>
		</div>
	</div>
	<section class="categories over_hidden">
		<div class="box">
			<h2 contenteditable="true" class="center">Categories</h2>
			<div class="box_categories">
				<a href="cases.php">
					<div class="category cetegory_cases center">
						<img src="img/category_case.jpg" alt="case">
						<h3 contenteditable="true">Phone cases</h3>
					</div>
				</a>	
			</div> 
			<div class="box_categories>">
				<a href="powerbanks.php">
					<div class="category category_powerbanks center">
						<img src="img/categoty_powerbank.jpg" alt="powerbank">
						<h3 contenteditable="true">Powerbanks</h3>
					</div>
				</a>
			</div>
			<div class="box_categories">
				<a href="headphones.php">
					<div class="category category_headphones center">
						<img src="img/category_headphones.jpeg" alt="headphones">
						<h3 contenteditable="true">Headphones</h3>
					</div>
				</a>	
			</div>
		</div>
	</section>
</body>
</html>