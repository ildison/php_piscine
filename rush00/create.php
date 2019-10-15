<?php
function ft_error()
{
	echo "ERROR\n";
	exit;
}
header("Content-Type: text/html");
if ($_POST["submit"] !== "registration" || !$_POST["login"] || !$_POST["passwd"])
	{
		$_POST["submit"];
		ft_error();
	}
if (!file_exists("./private"))
	mkdir("./private/");
else if (file_exists("./private/passwd"))
{
	if (($file = unserialize(file_get_contents("./private/passwd"))))
		foreach ($file as $key => $value) {
			if ($value["login"] === $_POST["login"])
				ft_error();
		}	
}
$log["login"] = $_POST["login"];
$log["passwd"] = hash("whirlpool", $_POST['passwd']);
$file[] = $log;
file_put_contents("./private/passwd", serialize($file));
echo "You registered<br>";
echo "<a href='index.php'>On the main</a>";
?>