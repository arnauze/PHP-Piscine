<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$d_ser = file_get_contents("../private/chat");
	$d_unser = unserialize($d_ser);
	foreach ($d_unser as $index) 
	{
		foreach ($index as $key => $value)
		{
			if ($key == "time")
				echo "[$value]";
			if ($key == "login")
				echo " <b>$value</b>: ";
			if ($key == 'msg')
				echo "$value<br>";
		}
	}
?>
</body>
</html>