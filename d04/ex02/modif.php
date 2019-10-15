<?php
if ($_POST['submit'] === 'OK')
{
	if (file_exists("../private") === FALSE || file_exists("../private/passwd") === FALSE || $_POST['newpw'] === "")
	{
		echo "ERROR\n";
		return -1;
	}
	$accounts = unserialize(file_get_contents("../private/passwd"));
	if ($accounts[$_POST['login']]['login'] != $_POST['login'] ||
				$accounts[$_POST['login']]['passwd'] !=  hash('sha256', $_POST['oldpw']))
	{
		echo "ERROR\n";
		return -1;
	}
	$accounts[$_POST['login']]['passwd'] = hash('sha256', $_POST['newpw']);
	$seriazlize_accounts = serialize($accounts);
	file_put_contents("../private/passwd", $seriazlize_accounts);
	echo "OK\n";
}
?>