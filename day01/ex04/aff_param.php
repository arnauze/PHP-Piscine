#!/usr/bin/php
<?php


$x = 0;
foreach($argv as $elem)
{
	if ($x != 0)
		echo($elem)."\n";
	$x++;
}

?>