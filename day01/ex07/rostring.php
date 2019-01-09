#!/usr/bin/php
<?php


function ft_split($string)
{
	$tmp = array_filter(explode(' ', $string));
	return ($tmp);
}

if ($argc > 1)
{
	$tab = ft_split($argv[1]);
	$i = 0;
	foreach($tab as $elem)
	{
		if ($i != 0)
			echo($elem)." ";
		$i++;
	}
	$i = 0;
	foreach($tab as $elem)
	{
		if ($i == 0)
			echo($elem)."\n";
		$i++;
	}
}
?>