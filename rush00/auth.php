<?php
session_start();

function db_connect()
{
	$host = "localhost:8800";
	$user = "root";
	$pw = "root";
	$db = "rush00";
	$conn = mysqli_connect($host, $user, $pw, $db);
	return $conn;
}

function db_get_table($table, $conn)
{
	return mysqli_query($con, "SELECT * FROM ".$table);
}

// function auth($login, $passwd)
// {
// 	$conn = db_connect();
// 	$user_table = db_get_table('user', $conn);
// 	$hashed_password = hash("whirlpool", $passwd);
// 	return $user_table;
// }
?>