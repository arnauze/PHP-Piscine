#!/usr/bin/php
<?php
	
	if ($argc == 2)
	{
		$tmp = array_filter(explode(' ', $argv[1]));
		$i = count($tmp);
		$x = 0;

		foreach($tmp as $elem)
		{
			echo($elem);
			if (++$x < $i)
				echo(" ");
			else
				echo("\n");
		}
	}
?>