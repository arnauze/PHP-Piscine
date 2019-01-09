#!/usr/bin/php
<?php

function ft_split($string)
{
	$tmp = array_filter(explode(' ', $string));
	sort($tmp);
	return ($tmp);
}

?>