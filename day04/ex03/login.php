<?php
include('auth.php');

session_start();

$login = $_GET['login'];
$password = $_GET['passwd'];

if (auth($login, $password) == true)
{
	$_SESSION['loggued_on_user'] = $login;
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>