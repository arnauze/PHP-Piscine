<?php
session_start();
$host = "localhost:8800";
$user = "root";
$pw = "root";
$db = "rush00";
$conn = mysqli_connect($host, $user, $pw, $db);

if ($_POST['submit1'])
	$item_id = $_SESSION['art1'];
else if ($_POST['submit2'])
	$item_id = $_SESSION['art2'];
else if ($_POST['submit3'])
	$item_id = $_SESSION['art3'];
else if ($_POST['submit4'])
	$item_id = $_SESSION['art4'];

$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id='".$item_id."'");

foreach ($result as $key => $value)
{
	$item = $value;
}

$_SESSION['price'] += $item['price'];

if ($_POST['submit1'])
	array_push($_SESSION['articles'], array($item['name'] => $item['price']));
else if ($_POST['submit2'])
	array_push($_SESSION['articles'], array($item['name'] => $item['price']));
else if ($_POST['submit3'])
	array_push($_SESSION['articles'], array($item['name'] => $item['price']));
else if ($_POST['submit4'])
	array_push($_SESSION['articles'], array($item['name'] => $item['price']));

header('Location: articles.php');

?>