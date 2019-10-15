<?php
	function delete_goods($goods)
	{
		$fd = fopen("database/shop.csv", 'r');
		while (($data = fgetcsv($fd, ',')))
		{
			if ($data[1] == $goods)
				$data[3] = "hidden";
			$array[] = $data;
		}
		fclose($fd);
		$fd = fopen("database/shop.csv", 'w');
		foreach($array as $data)
			fputcsv($fd, $data);
		fclose($fd);
	}
?>