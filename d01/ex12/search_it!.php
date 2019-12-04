#!/usr/bin/php
<?php

function pars_key_val($argc, $argv)
{
	$array = array();
	if ($argc > 2)
	{
		$arr = array_slice($argv, 2);
		foreach ($arr as $ar)
			if (strstr($ar, ':'))
			{
				$split = explode(':', $ar, 2);
				$array[$split[0]] = $split[1];
			}
	}
	return ($array);
}

if ($argc > 1)
{
	$key = $argv[1];
	$array = pars_key_val($argc, $argv);
	if (array_key_exists($key, $array))
		echo $array[$key] . PHP_EOL;
}
?>