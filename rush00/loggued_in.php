<?php
session_start();
$user = $_SESSION['loggued_in_user'];
?>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h3 style="font-size: 10vw; padding-top: 25vw;">Hello <?php echo $user;?></h3></center>
</body>
</html>