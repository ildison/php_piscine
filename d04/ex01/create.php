<?php
if ($_POST['submit'] === 'OK')
{
	if ($_POST['passwd'] === "")
	{
		echo "ERROR\n";
		return -1;
	}
	if (file_exists("../private") === FALSE)
		mkdir("../private");
	if (file_exists("../private/passwd") === FALSE)
		$accounts = [[]];
	else
	{
		$accounts = unserialize(file_get_contents("../private/passwd"));
		if ($accounts[$_POST['login']]['login'] == $_POST['login'])
		{
			echo "ERROR\n";
			return -1;
		}
	}
	$accounts[$_POST['login']]['login'] = $_POST['login'];
	$accounts[$_POST['login']]['passwd'] = hash('sha256', $_POST['passwd']);
	$seriazlize_accounts = serialize($accounts);
	file_put_contents("../private/passwd", $seriazlize_accounts);
	echo "OK\n";
}
?>
