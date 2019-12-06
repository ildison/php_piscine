#!/usr/bin/php
<?php
if ($argc == 2)
{
	$ch = curl_init($argv[1]);
	if ($ch == TRUE)
	{
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$html_body = curl_exec($ch);
		curl_close($ch);
		$dir = str_replace("http://", '', $argv[1]);
		if (!file_exists($dir))
			mkdir($dir);
		preg_match_all('/(?<=img src=").*?(?=")/', $html_body, $imgs);
		foreach ($imgs[0] as $img)
		{
			$name = substr(strrchr($img, '/'), 1);
			strstr($img, "https://") == false ? $url = "https://" . $dir . $img : $url = $img;
			$fd = fopen($dir . '/' . $name, 'w');
			$ch = curl_init($url);
			if ($ch == FALSE)
				break ;
			curl_setopt($ch, CURLOPT_FILE, $fd);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_exec($ch);
			curl_close($ch);
		}
	}
}
?>