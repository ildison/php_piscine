#!/usr/bin/php
<?php
function do_op($doop)
{
    if ($doop['oper'] == "+")
        echo ($doop['first'] + $doop['second']) . PHP_EOL;
    else if ($doop['oper'] == "-")
        echo ($doop['first'] - $doop['second']) . PHP_EOL;
    else if ($doop['oper'] == "*")
        echo ($doop['first'] * $doop['second']) . PHP_EOL;
    else if ($doop['oper'] == "/" && $doop['second'] != 0)
        echo ($doop['first'] / $doop['second']) . PHP_EOL;
    else if ($doop['oper'] == "%" && $doop['second'] != 0)
		echo ($doop['first'] % $doop['second']) . PHP_EOL;
	else
		echo "Error: Division by zero" . PHP_EOL;
}

function pars_args($av)
{
	$split = preg_split("/[\s]+/", trim($av));
	if (count($split) == 2 || count($split) > 3 || $av === "")
		return (0);
	if (count($split) == 3)
		return (array('first'=>$split[0], 'second'=>$split[2], 'oper'=>$split[1]));
	foreach (array('+', '*', '/', '%', '-') as $splitted)
	{
		$pos = strpos($av, $splitted, 1);
		if ($pos)
			break ;
	}
	if (!$pos)
		return (0);
	$minus = false;
	if ($av[0] == '-' && $splitted == '-')
	{
		$av[0] = ' ';
		$minus = true;
	}
	$nums = explode($splitted, $av, 2);
	if ($minus)
		$nums[0][0] = '-';
	return (array('first'=>$nums[0], 'second'=>$nums[1], 'oper'=>$splitted));
}

function check_syntax($check)
{
	if ($check == 0)
		return (0);
	if (!is_numeric($check['first']) || !is_numeric($check['second']))
		return (0);
	foreach (array("+", "*", "/", "%", "-") as $oper)
	{
		if ($oper === $check['oper'])
			return (1);
	}
	return (0);
}

if ($argc == 2)
{
	$pars = pars_args($argv[1]);
	if (check_syntax($pars))
		do_op($pars);
	else
		echo "Syntax Error" . PHP_EOL;
}
else
	echo "Incorect Parametrs" . PHP_EOL;

?>