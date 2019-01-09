#!/usr/bin/php
<?php
if ($argc == 4)
{
	$i = 0;
	$count = 0;
	while ($argv[2][$i])
	{
		if ($argv[2][$i] == '+' || $argv[2][$i] == '*' ||  $argv[2][$i] == '-'
			||  $argv[2][$i] == '/' ||  $argv[2][$i] == '%')
			$count++;
	}
	if ($count != 1)
		exit();
	$i = 0;
	while ($argv[2][$i])
	{
		if ($argv[2][$i] == '+')

		else if ($argv[2][$i] == '*')

		else if ($argv[2][$i] == '-')

		else if ($argv[2][$i] == '/')

		else if ($argv[2][$i] == '%')
			
	}
}
else
	echo("Incorrect Parameters\n");
?>