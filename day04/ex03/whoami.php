<?php
session_start();
if (($user = $_SESSION['loggued_on_user']) != "")
	echo $_SESSION['loggued_on_user']."\n";
else
	echo "ERROR\n";
?>