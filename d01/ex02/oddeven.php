#!/usr/bin/php
<?php

while (1)
{
	echo "Enter a number: ";
	$input = fgets(STDIN);
	if ($input == false)
		break;
	$value = trim($input, "\n");
	$num = filter_var($value, FILTER_VALIDATE_INT);
	if (is_int($num))
		($num % 2) ? print("The number $num is odd\n") : print("The number $num even\n");
	else
		print("'$value' is not a number\n");
}
print "\n";

?>