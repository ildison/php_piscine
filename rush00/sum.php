<?php
	function sum()
	{
		session_start();
		if ($_SESSION["loggued_on_user"] != "")
			$goods = $_SESSION["login_basket"];
		else
			$goods = $_SESSION["basket"];
		$sum = 0;
		foreach($goods as $price)
			$sum = $sum + ($price['price'] * $price['count']);
		return ($sum);
	}
?>