<?php
	include('auth.php');

	session_start();
	date_default_timezone_set("America/Los_Angeles");

	function ft_get_chat()
	{
		$fd = fopen("../private/chat", "r+");
		flock($fd, LOCK_EX);
		if (($data_serialized = file_get_contents("../private/chat")) != "")
			return (unserialize($data_serialized));
		return "";
	}

	if (($msg = $_POST['msg']) != "")
	{
		if (($chat = ft_get_chat()) != "")
		{
			array_push($chat, array("time" => date("G:i", time()), "login" => $_SESSION['loggued_in_user'], "msg" => $msg));
			$data = serialize($chat);
		}
		else
			$chat = array(array("time" => date("G:i", time()), "login" => $_SESSION['loggued_in_user'], "msg" => $msg));
		file_put_contents("../private/chat", serialize($chat));
		fclose($fd);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.input {
			height: 30px;
			width: 75vw;
			border: none;
			font-size: 18px;
		}
		.submit {
			width: 15vw;
			height: 30px;
			margin-right: 0px;
		}
	</style>
</head>
<body>
	<center>
		<form method="POST" action="speak.php">
			<input class="input" type="text" name="msg">
			<input class="submit" type="submit" name="OK" value="send">
		</form>
	</center>
</body>
</html>