<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css"  href="style.css">
	<title>Cases</title>
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
		<aside class="sidebar center">
			<h5 contenteditable="true">Categories</h5>
			<a href="cases.php"><div class="item">Phone cases</div></a>
			<a href="powerbanks.php"><div class="item">Powerbanks</div></a>
			<a href="headphones.php"><div class="item">Headphones</div></a>
		</aside>
		<section class="section_goods">
				<div class="goods">
					<div class="goods_item">
						<img src="img/head1.jpg" width="200px" alt="blue">
						<h4 contenteditable="true">Sony</h4>
						<p contenteditable="true">Price: 200$</p>
						<button>Buy</button>
					</div>
					<div class="goods_item">
						<img src="img/head2.jpg" width="200px" alt="red">
						<h4 contenteditable="true">Beats</h4>
						<p contenteditable="true">Price: 250$</p>
						<button>Buy</button>
					</div>
					<div class="goods_item">
						<img src="img/head3.jpg" width="200px" alt="yellow">
						<h4 contenteditable="true">Hi-Black</h4>
						<p contenteditable="true">Price: 150$</p>
						<button>Buy</button>
					</div>
				</div>
		</section>
	</div>
</body>
</html>