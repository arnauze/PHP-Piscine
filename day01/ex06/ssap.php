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

	sort($final);

	foreach($final as $word)
	{
		echo($word)."\n";
	}
}
?>