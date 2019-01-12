<?php
include('auth.php');

session_start();

$login = $_GET['login'];
$password = $_GET['passwd'];
?>
<html>
<head>
	<style type="text/css">
		.split {
			height: 600px;
		}
		.up {
			margin-top: 0;
			height: 550px;
		}
		.down {
			margin-bottom: 0;
			height: 50px;
		}
	</style>
</head>
<body>
	<center>
		<div class="split">
			<iframe class="up" src="chat.php"></iframe><br>
			<iframe src="speak.php" class="down"></iframe>
		</div>
	</center>
</body>
</html>