<?php

// function ft_exit($str)
// {
// 	echo "$str\n";
// 	exit();
// }

$login = $_POST['login'];
$passwd = $_POST['passwd'];
if ($passwd != "" && $_POST['submit'] == "OK")
{
	$file_serialized = file_get_contents("../private/passwd");
	if ($file_serialized != "")
	{
		$file_unserialized = unserialize($file_serialized);
		foreach ($file_unserialized as $x)
		{
			foreach ($x as $key => $value)
			{
				if ($value == $login)
					ft_exit("ERROR");
			}
		}
		$hashed = hash("whirlpool", $passwd);
		array_push($file_unserialized, array("login" => $login, "passwd" => $hashed));
		$data_serialized = serialize($file_unserialized);
		file_put_contents("../private/passwd", $data_serialized);
		echo "OK\n";
		header("Location: index.html");
	}
	else
	{
		$hashed_password = hash("whirlpool", $passwd);
		$data = array(
			array(
				"login" => $login,
				"passwd" => $hashed_password
			));
		$data_serialized = serialize($data);
		file_put_contents("../private/passwd", $data_serialized);
		echo "OK\n";
		header("Location: index.html");
	}
}
else
	echo "ERROR\n";
header("Location: index.html");
exit();

?>