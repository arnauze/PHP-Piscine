<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
		<form method="POST" name="login.php" action="login.php">
			Login: <input type="text" name="login" ><br>
			Password: <input type="password" name="passwd" ><br>
			<input type="submit" name="submit" value="OK"><br>
			<a href="create.html" style="font-size: 14px;">Create a new account</a><br>
			<a href="modif.html" style="font-size: 14px;">Change your password</a>
		</form>
		<?php
		session_start();
		$host = "localhost:8800";
		$user = "root";
		$pw = "root";
		$db = "rush00";
		$found = false;
		$conn = mysqli_connect($host, $user, $pw, $db);
		$var = mysqli_query($conn, "SELECT * FROM user");
		foreach($var as $key => $value)
		{
			if (($value['login'] == $_POST['login']) && ($value['password'] == hash('whirlpool', $_POST['passwd'])))
				$found = true;
		}
		if ($found)
			$_SESSION['loggued_in_user'] = $_POST['login'];
		else
			$_SESSION['loggued_in_user'] = '';
		?>
</body>
</html>