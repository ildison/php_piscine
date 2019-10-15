<?php
session_start();
header("Content-Type: text/html");
include 'auth.php';
$file = unserialize(file_get_contents("../private/passwd"));
if (auth($_POST["login"], $_POST["passwd"]))
{
	$_SESSION["login"] = $_POST["login"];
	$_SESSION["loggued_on_user"] = $_POST["login"];
	if ($_SESSION["basket"])
	{
		$_SESSION["login_basket"] = $_SESSION["basket"];
		$_SESSION["basket"] = "";
	}
	header("Location: index.php");
	exit;
}
$_SESSION["loggued_on_user"] = "";
echo "ERROR<br>";
echo "<a href='index.php'>On the main</a>";

?>