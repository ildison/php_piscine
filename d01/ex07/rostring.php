#!/usr/bin/php
<?php

if ($argc > 1)
{
	$result = trim($argv[1]);
	$array = preg_split("/[\s]+/", trim($argv[1], " "));
	if (count($array) > 1)
	{
		$first_elem = array_shift($array);
		array_push($array, $first_elem);
		$result = implode(" ", $array);
	}
	if ($result)
		echo $result."\n";
}

?>