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
			<div class="buttons">
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
						<img src="img/pb1.jpeg" width="200px" alt="blue">
						<h4 contenteditable="true">10400 mAh</h4>
						<p contenteditable="true">Price: 50$</p>
						<button>Buy</button>
					</div>
					<div class="goods_item">
						<img src="img/pb2.jpg" width="200px" alt="red">
						<h4 contenteditable="true">10000 mAh</h4>
						<p contenteditable="true">Price: 45$</p>
						<button>Buy</button>
					</div>
					<div class="goods_item">
						<img src="img/pb3.jpg" width="200px" alt="yellow">
						<h4 contenteditable="true">15000 mAh</h4>
						<p contenteditable="true">Price: 75$</p>
						<button>Buy</button>
					</div>
				</div>
		</section>
	</div>
</body>
</html>