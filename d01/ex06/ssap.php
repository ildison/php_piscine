#!/usr/bin/php
<?php

if ($argc > 1)
{
	$i = $argc;
	$array = array();
	while (--$i)
		$array = array_merge($array, preg_split("/[\s]+/", trim($argv[$i], " ")));
	sort($array);
	foreach ($array as $arr)
		echo $arr . PHP_EOL;
}

?>