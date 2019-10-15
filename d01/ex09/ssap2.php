#!/usr/bin/php
<?php

function my_sort($a, $b)
{
	$a = strtolower($a);
	$b = strtolower($b);
	$arr_a = str_split($a);
	$arr_b = str_split($b);
	$len_a = count($arr_a);
	$len_b = count($arr_b);
	$min = min($len_a, $len_b);
	for ($i = 0; $i < $min; $i++)
	if ($arr_a[$i] != $arr_b[$i])
	{
		if ($arr_a[$i] >= 'a' && $arr_a[$i] <= 'z')
		{
			if ($arr_b[$i] >= 'a' && $arr_b[$i] <= 'z' && $arr_a[$i] > $arr_b[$i])
				return (1);
			return (-1);
		}
		else if (($arr_a[$i] >= '0' && $arr_a[$i] <= '9'))
		{
			if ($arr_b[$i] >= 'a' && $arr_b[$i] <= 'z')
				return (1);
			else if ($arr_b[$i] >= '0' && $arr_b[$i] <= '9' && $arr_a[$i] > $arr_b[$i] )
				return (1);
			return (-1);
		}
		else
		{
			if (($arr_b[$i] >= 'a' && $arr_b[$i] <= 'z') || ($arr_b[$i] >= '0' && $arr_b[$i] <= '9'))
				return (1);
			return ($arr_a[$i] > $arr_b[$i] ? 1 : -1);
		}
	}
	if ($len_a != $len_b)
        return ($len_a > $len_b ? 1 : -1);
	return (0);
}

if ($argc > 1)
{
	$n = $argc;
	$array = array();
	for ($i = 1; $i < $n; ++$i)
		$array = array_merge($array, preg_split("/[\s]+/", trim($argv[$i], " ")));
	usort($array, "my_sort");
	foreach ($array as $word)
		echo $word."\n";
}

?>