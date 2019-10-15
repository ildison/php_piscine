<?php

function ft_is_sort($array)
{
	$check_sort = $array;
	sort($check_sort);
	if ($array === $check_sort)
		return (true);
	else
		return (false);
}

?>