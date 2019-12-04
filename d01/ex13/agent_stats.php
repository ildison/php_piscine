#!/usr/bin/php
<?php

function average($data)
{
	$counter = 0;
	$average = 0;
	foreach ($data as $user)
	{
		if ($user[1] !== "" && $user[2] !== "moulinette")
		{
			$average += $user[1];
			++$counter;
		}
	}
	echo $average / $counter . PHP_EOL;
}

function average_user($data)
{
	$users = array();
	foreach ($data as $user)
	{
		if ($user[1] !== "" && $user[2] !== "moulinette")
		{
			$users[$user[0]]['grade'] += $user[1];
			++$users[$user[0]]['counter'];
		}
	}
	ksort($users);
	foreach ($users as &$user)
		$user['grade'] /= $user['counter'];
	return ($users);
}

function print_average_user($users)
{
	foreach ($users as $key=>$user)
		echo $key . ":" . $user['grade']. PHP_EOL;
}

function moulinette_variance($data, $users)
{
	foreach ($data as $user)
		if ($user[1] !== "" && $user[2] === "moulinette")
			$users[$user[0]]['grade'] -= $user[1];
	print_average_user($users);
}

if ($argc == 2)
{
	fgets(STDIN);
	$data = array();
	while ($line = fgets(STDIN))
		$data[] = explode(';', $line);
	switch ($argv[1])
	{
		case "average":
		average($data);
		break ;
		case "average_user":
		$users = average_user($data);
		print_average_user($users);
		break ;
		case "moulinette_variance":
		$users = average_user($data);
		moulinette_variance($data, $users);
	}

}

?>