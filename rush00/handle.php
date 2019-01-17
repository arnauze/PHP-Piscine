<?php
session_start();
$host = "localhost";
$user = "root";
$pw = "root";
$db = "rush00";
$conn = mysqli_connect($host, $user, $pw, $db);
if ($_POST['clear'])
{
	$_SESSION['price'] = 0;
	$_SESSION['articles'] = array();
}
else if ($_POST['order'])
{
	if ($_SESSION['loggued_in_user']  != '')
	{
		$var = mysqli_query($conn, "INSERT INTO `order` (`order_id`, `price`, `login`, `archived`) VALUES ('', '".$_SESSION['price']."', '".$_SESSION['loggued_in_user']."', '1')");
		$_SESSION['price'] = 0;
		$_SESSION['articles'] = array();
	}
}
header('Location: basket.php');
?>