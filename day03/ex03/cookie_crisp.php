<?php
if (($action = $_GET['action']) == "set" && ($name = $_GET['name']) && ($value = $_GET['value']))
	setcookie($name, $value, time() + 86400 * 30);
else if (($action = $_GET['action']) == "get" && ($name = $_GET['name']) && !$_GET['value'])
	echo("$_COOKIE[$name]");
else if (($action = $_GET['action']) == "del" && ($name = $_GET['name']) && !$_GET['value'])
	setcookie($name, "", 1);
?>