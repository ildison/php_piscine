<?php
	function auth($login, $passwd)
	{
		if (file_exists("../private") === FALSE || file_exists("../private/passwd") === FALSE || $passwd === "")
			return (FALSE);
		$accounts = unserialize(file_get_contents("../private/passwd"));
		if ($accounts[$login]['login'] === $login && $accounts[$login]['passwd'] ===  hash('sha256', $passwd))
			return (TRUE);
		else
			return (FALSE);
	}
?>