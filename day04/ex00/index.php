<?php
session_start();
if ($_GET['submit'])
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html>
	<body>
		<form method="GET">
			Login: <input type="text" name="login" value="<?php if($_SESSION['login']) { echo($_SESSION['login']); }?>"><br>
			Password: <input type="text" name="passwd" value="<?php if($_SESSION['passwd']) { echo($_SESSION['passwd']); }?>"><br>
			<input type="submit" name="submit" value="OK">
		</form>>
	</body>
</html>