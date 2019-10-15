<?php

function ft_split($str)
{
	$str = preg_split("/[\s]+/", trim($str, " "));
	sort($str);
	return ($str);
}

?>