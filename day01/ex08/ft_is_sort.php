#!/usr/bin/php
<?php

function ft_is_sort($tab)
{
	foreach($tab as $elem)
	{
		$new_tab[] = $elem;
	}
	sort($new_tab);
	$i = 0;
	foreach($new_tab as $elem)
	{
		if ($elem != $tab[$i])
			return false;
		$i++;
	}
	return true;
}

?>