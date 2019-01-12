<?php

function ft_get_data()
{
	if (($data_serialized = file_get_contents("../private/passwd")) == "")
		ft_exit("ERROR\n");
	$data_unserialized = unserialize($data_serialized);
	return $data_unserialized;
}

function auth($login, $passwd)
{
	$found = false;
	$data_unserialized = ft_get_data();
	$hashed_password = hash("whirlpool", $passwd);
	foreach($data_unserialized as $index)
	{
		foreach($index as $key => $value)
		{
			if ($value == $login)
				$found = true;
			else if ($value == $hashed_password && $found == true)
				return true;
		}
	}
	return false;
}
?>