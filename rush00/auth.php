<?php
session_start();
function auth($login, $passwd)
{
	$file = unserialize(file_get_contents("./private/passwd"));
	foreach ($file as $key => $value) {
		if ($value["passwd"] == hash("whirlpool", $passwd) && $value["login"] == $login)
			return (TRUE);
	}
	return (FALSE);
}
?>