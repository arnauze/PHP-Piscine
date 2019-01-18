<?php

define("WIDTH", 75);
define("HEIGHT", 50);

function rollDice() {
	return rand(1, 6);
}

function createMap($x, $y) {
	$map = array( array() );
	$i = 0;
	$j =0;
	while ($i < $x)
	{
		$j = 0;
		while ($j < $y)
		{
			$map[$i][$j] = 0;
			$j++;
		}
		$i++;
	}
	$map = addObstacle($map);
	return $map;
}

function addPlayers($player1, $player2, $map) {
	$p1 = array();
	$p2 = array();
	foreach($player1 as $key => $value)
	{
		if (empty($p1))
			$p1 = array($value->getCoord());
		else
			array_push($p1, $value->getCoord());
	}
	foreach($player2 as $key => $value)
	{
		if (empty($p2))
			$p2 = array($value->getCoord());
		else
			array_push($p2, $value->getCoord());
	}
	print_r($p1);
	print_r($p2);
}

function addObstacle($map) {
	while ($i < 10)
	{
		$x = rand(10, WIDTH - 10);
		$y = rand(10, HEIGHT - 10);
		$map[$y][$x++] = 1;
		$map[$y][$x++] = 1;
		$map[$y][$x++] = 1;
		$map[$y][$x++] = 1;
		$map[$y][$x++] = 1;
		$i++;
	}
	return $map;
}

function outputMap($map) {
	$i = 0;
	$j = 0;
	while ($i < HEIGHT)
	{
		$j = 0;
		while ($j < WIDTH)
		{
			print($map[$i][$j]);
			$j++;
		}
		print("\n");
		$i++;
	}
}

$map = createMap(HEIGHT, WIDTH);
outputMap($map);
?>