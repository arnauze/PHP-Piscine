#!/usr/bin/php
<?php

while (1)
{
	echo("Enter a number: ");
	$nb = trim(fgets(STDIN));
	if (feof(STDIN) == true)
	{
		echo("^D\n");
		exit();
	}
	if (!is_numeric($nb))
		echo("'$nb' is not a number\n");
	else
	{
		if (($nb % 2) == 0)
			echo("The number $nb is even\n");
		else
			echo("The number $nb is odd\n");
	}
}

?>