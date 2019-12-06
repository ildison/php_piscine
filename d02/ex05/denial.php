#!/usr/bin/php
<?php

function index_in_arr($cols, $key)
{
	for ($i = 0; $i < count($cols); ++$i)
		if ($cols[$i] === $key)
			return ($i);
	return (-1);
}

if ($argc == 3 && file_exists($argv[1]))
{
	$key = $argv[2];
	$fd = fopen($argv[1], 'r');
	$cols = preg_split('/;/', fgets($fd));
	$index = index_in_arr($cols, $key);
	if ($index != -1)
	{
		foreach ($cols as $arr)
			$$arr = array();
		while (($array = fgets($fd)))
		{
			$array = preg_split('/;/', $array);
			foreach ($cols as $k=>$arr)
				${$arr}[$array[$index]] = $array[$k];
		}
		while (1)
		{
			echo "Enter your command: ";
			$input = fgets(STDIN);
			if ($input == false)
			{
				echo PHP_EOL;
				break;
			}
			eval($input);
		}
	}
}

?>