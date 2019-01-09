#!/usr/bin/php
<?php
if ($argc == 4)
{
	$i = 0;
	$count = 0;
	$i = 0;
	while ($argv[2][$i] && ($i < count($argv)))
	{
		if ($argv[2][$i] == '+')
		{
			$result = trim($argv[1]) + trim($argv[3]);
			break ;
		}
		else if ($argv[2][$i] == '*')
		{
			$result = trim($argv[1]) * trim($argv[3]);
			break ;
		}
		else if ($argv[2][$i] == '-')
		{
			$result = trim($argv[1]) - trim($argv[3]);
			break ;
		}
		else if ($argv[2][$i] == '/')
		{
			$result = trim($argv[1]) / trim($argv[3]);
			break ;
		}
		else if ($argv[2][$i] == '%')
		{
			$result = trim($argv[1]) % trim($argv[3]);
			break ;
		}
		$i++;
	}
	echo($result)."\n";
}
else
	echo("Incorrect Parameters\n");
?>