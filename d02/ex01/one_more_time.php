#!/usr/bin/php
<?php

if ($argc > 1)
{
	setlocale(LC_TIME, "fr_FR");
	date_default_timezone_set("Europe/Paris");
	$format = "%A %e %B %Y %H:%M:%S";
	if (preg_match("/^[a-zA-z]+ [0-9]{1,2} [a-zA-z]+ [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]) && ($mk = strptime($argv[1], $format)))
	{
		$unix_time = mktime($mk[tm_hour], $mk[tm_min], $mk[tm_sec], $mk[tm_mon] + 1, $mk[tm_mday], $mk[tm_year] + 1900);
		echo $unix_time."\n";
	}
	else
		echo "Wrong Format\n";
}

?>