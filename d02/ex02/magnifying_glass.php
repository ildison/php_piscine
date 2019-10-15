#!/usr/bin/php
<?php

if ($argc > 1)
{
	$file = file_get_contents($argv[1]);
	preg_match_all("/<a.*</", $file, $links);
	$links = $links[0];
	$replace = array();
	foreach ($links as $link)
		if (preg_match_all("/(=\".*\")/", $link, $titl))
			$replace = array_merge($replace, $titl[0]);
	foreach ($links as $link)
		if (preg_match_all("/>.*?</", $link, $this_too))
			$replace = array_merge($replace, $this_too[0]);
	$to_upper = array();
	foreach($replace as $repl)
	{
		$up = strtoupper($repl);
		array_push($to_upper, $up);
	}
	$file = str_replace($replace, $to_upper, $file);
	echo $file;
}

?>