#!/usr/bin/php
<?php

function ft_split($string)
{
	$tmp = array_filter(explode(' ', $string));
	return ($tmp);
}


if ($argc > 1)
{
	$x = 0;
	$number = array();
	$other = array();
	foreach($argv as $elem)
	{
		if ($x != 0)
			$new[] = ft_split($elem);
		$x++;
	}
	foreach($new as $elem)
	{
		foreach($elem as $piece)
			$final[] = $piece;
	}

	foreach($final as $elem)
	{
		if (is_numeric($elem[0]))
			$number[] = $elem;
		else if (ctype_alpha($elem[0]))
			$words[] = $elem;
		else
			$other[] = $elem;
	}

	usort($words, "strnatcasecmp");
	sort($number, SORT_STRING);
	sort($other);

	foreach($words as $elem)
	{
		echo("$elem\n");
	}
	foreach($number as $elem)
	{
		echo("$elem\n");
	}
	foreach($other as $elem)
	{
		echo("$elem\n");
	}
}

?>