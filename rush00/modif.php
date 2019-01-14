<?php 
	$host = "localhost:8800";
	$user = "root";
	$pw = "root";
	$db = "rush00";
	$h_pw = hash('whirlpool', $_POST['oldpw']);
	$h_npw = hash('whirlpool', $_POST['newpw']);
	$login = $_POST['login'];
	$changed = false;

	$conn = mysqli_connect($host, $user, $pw, $db);
	$var = mysqli_query($conn, "UPDATE `user` SET `password` = '".$h_npw."' WHERE `user`.`login` = '".$login."'");

	if ($var)
		header('Location: login.php');
	else
		header('Location: modif.html');
?>