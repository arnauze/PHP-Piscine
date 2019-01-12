<?php
include('auth.php');

session_start();

$login = $_POST['login'];
$password = $_POST['passwd'];
?>
<html>
<head>
	<style type="text/css">
		.split {
			height: 600px;
			width: 450px;
		}
		.up {
			margin-top: 0;
			height: 550px;
			width: 450px;
		}
		.down {
			margin-bottom: 0;
			height: 50px;
			width: 450px;
		}
	</style>
</head>
<body>
	<?php
	if (auth($login, $password) == true)
	{
		$_SESSION['loggued_in_user'] = $login;
		echo "<center><div class=\"split\"><iframe class=\"up\" src=\"chat.php\"></iframe><br><iframe src=\"speak.php\" class=\"down\"></iframe></div></center>";
	}
	else
	{
		$_SESSION['loggued_in_user'] = "";
		header("Location: index.html");
	}
	?>
</body>
</html>