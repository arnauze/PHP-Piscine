<?php
	$host = "localhost";
	$user = "root";
	$pw = "root";
	$db = "rush00";
	$h_pw = hash('whirlpool', $_POST['passwd']);
	$found = false;
	$conn = mysqli_connect($host, $user, $pw, $db);
	$var = mysqli_query($conn, "SELECT * FROM user");
	foreach($var as $key => $value)
	{
		if (($value['login'] == $_POST['login']) && ($value['password'] == $h_pw))
			$found = true;
	}
	if (!$found)
	{
		$var = mysqli_query($conn, "INSERT INTO `user` (`user_id`, `login`, `password`, `admin`) VALUES ('', '".$_POST['login']."', '".$h_pw."', '0')");
	}
	header('Location: login.php')
?>