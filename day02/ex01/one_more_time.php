#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
function ft_error()
{
	echo "Wrong Format\n";
	exit();
}

function ft_is_month($str)
{
	$year_cap = array(
		"Janvier" => "January",
		"Fevrier" => "February",
		"Mars" => "March",
		"Avril" => "April",
		"Mai" => "May",
		"Juin" => "June",
		"Juillet" => "July",
		"Aout" => "August",
		"Septembre" => "September",
		"Octobre" => "October",
		"Novembre" => "November",
		"Decembre" => "December");
	$year_low = array(
		"janvier" => "January",
		"fevrier" => "February",
		"mars" => "March",
		"avril" => "April",
		"mai" => "May",
		"juin" => "June",
		"juillet" => "July",
		"aout" => "August",
		"septembre" => "September",
		"octobre" => "October",
		"novembre" => "November",
		"decembre" => "December");
	foreach($year_cap as $fr => $en)
	{
		if ($fr == $str)
			return $en;
	}
	foreach($year_low as $fr => $en)
	{
		if ($fr == $str)
			return $en;
	}
}

function ft_is_day($str)
{
	$day = array(
		"Lundi" => "lundi",
		"Mardi" => "mardi",
		"Mercredi" => "mercredi",
		"Jeudi" => "jeudi",
		"Vendredi" => "vendredi",
		"Samedi" => "samedi",
		"Dimanche" => "dimanche");
	foreach($day as $cap => $low)
	{
		if ($str == $cap || $str == $low)
			return true;
	}
	return false;
}

if ($argc == 2)
{
	$tab = explode(" ", $argv[1]);

	if (count($tab) != 5)
		ft_error();

	if ($tab[1] < 1 || $tab[1] > 31)
		ft_error();
	if (!ft_is_day($tab[0]))
		ft_error();
	if (strlen($tab[3]) != 4)
		ft_error();

	$new_month = ft_is_month($tab[2]);

	if (count($new_month) == 0)
		ft_error();

	$final = array($tab[1], $new_month, $tab[3], $tab[4]);

	$string = implode(" ", $final);

	if ($result = strtotime($string))
		echo($result);
	else
		ft_error();
}
?>