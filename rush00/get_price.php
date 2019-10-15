<?php
	function get_price($goods)
	{
		$fd = fopen("database/shop.csv", 'r');
		while(($data = fgetcsv($fd)))
			if ($data[1] == $goods)
				return ($data[2]);
		fclose($fd);
	}
?>