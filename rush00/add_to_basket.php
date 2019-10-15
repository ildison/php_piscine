
<?php
	function ft_add_to_basket($goods, $price)
	{
		session_start();
		if ($_SESSION["loggued_on_user"] != "")
		{
			if ($_SESSION["login_basket"][$goods])
				++$_SESSION["login_basket"][$goods]['count'];
			else
				$_SESSION["login_basket"][$goods] = array('goods' => $goods, "price" => $price, 'count' => 1);
		}
		else
		{
			if ($_SESSION["basket"][$goods])
				++$_SESSION["basket"][$goods]['count'];
			else
				$_SESSION["basket"][$goods] = array('goods' => $goods, "price" => $price, 'count' => 1);
		}
		print_r($_SESSION["basket"]);
	}
?>