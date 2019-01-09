#!/usr/bin/php
<?php
if ($argc > 2)
{
	$i = 2;
	$hash = array();
	while ($argv[$i] && ($i < count($argv)))
	{
		$ex = explode(':', $argv[$i]);
		$hash[$ex[0]] = $ex[1];
		$i++;
	}
	foreach($hash as $key=>$value)
	{
		if (!strcmp($key, $argv[1]))
			$save = $value;
	}
	if ($save)
		echo "$save\n";
}
?>