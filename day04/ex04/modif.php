<?php

function ft_exit($str)
{
	echo $str;
	exit();
}

function ft_get_data()
{
	if (($data_serialized = file_get_contents("../private/passwd")) == "")
		ft_exit("ERROR\n");
	$data_unserialized = unserialize($data_serialized);
	return $data_unserialized;
}

function ft_is_account($login)
{
	$data_unserialized = ft_get_data();
	foreach($data_unserialized as $index)
	{
		foreach($index as $key => $value)
		{
			if ($value == $login)
				return true;
		}
	}
	return false;
}

function ft_is_right_password($login, $oldpw)
{
	$found = false;
	$data_unserialized = ft_get_data();
	$hashed_password = hash("whirlpool", $oldpw);
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

if (!ft_is_account(($login = $_POST['login'])) ||
	!ft_is_right_password($login, ($oldpw = $_POST['oldpw'])) ||
	($newpw = $_POST['newpw']) == "")
	ft_exit("ERROR\n");
else
{
	$found = false;
	$data_unserialized = ft_get_data();
	$h_oldpw = hash("whirlpool", $oldpw);
	$h_newpw = hash("whirlpool", $newpw);
	foreach($data_unserialized as $index => $value)
	{
		if ($value['login'] == $login)
			$found = true;
		if ($value['passwd'] == $h_oldpw)
			$data_unserialized[$index]['passwd'] = $h_newpw;
	}
	$data = serialize($data_unserialized);
	file_put_contents("../private/passwd", $data);
	echo("OK\n");
}
?>