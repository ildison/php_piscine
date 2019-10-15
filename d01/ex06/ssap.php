#!/usr/bin/php
<?php

if ($argc > 1)
{
	$i = $argc;
	$array = array();
	while (--$i)
		$array = array_merge($array, preg_split("/[\s]+/", trim($argv[$i], " ")));
	sort($array);
	$n = count($array);
	while ($i < $n)
	{
		if ($array[$i])
			print $array[$i]."\n";
		++$i;
	}
}

?>