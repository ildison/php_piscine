#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Moscow');
$file = file_get_contents("/var/run/utmpx");
$file = substr($file, 1256);
while (strlen($file) >= 628)
{
   $pars = unpack("A256login/A4id/A32pars/lpid/ltype/ltime", $file);
   $time = date("M d H:i", $pars[time]);
   echo "$pars[login]\t$pars[pars]\t$time\n";
   $file = substr($file, 628);
}

?>