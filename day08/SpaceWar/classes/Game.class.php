<?php

require_once('Amiral.class.php');
require_once('Harpon.class.php');
require_once('MegaLaser.class.php');
require_once('Scout.class.php');
require_once('Spaceship.class.php');
require_once('Weapon.class.php');

define("WIDTH", 150);
define("HEIGHT", 100);

class Game {

	public $map = array();
	public $player1 = array();
	public $player2 = array();

	function rollDice() {
		return rand(1, 6);
	}

	function createMap($x, $y) {
		$i = 0;
		$j =0;
		while ($i < $x)
		{
			$j = 0;
			while ($j < $y)
			{
				$this->map[$i][$j] = 0;
				$j++;
			}
			$i++;
		}
		$this->addObstacle();
	}

	function addPlayers() {
		$p1 = array();
		$p2 = array();
		foreach($this->player1 as $key => $value)
		{
			if (empty($p1))
				$p1 = array($value->getCoord());
			else
				array_push($p1, $value->getCoord());
		}
		foreach($this->player2 as $key => $value)
		{
			if (empty($p2))
				$p2 = array($value->getCoord());
			else
				array_push($p2, $value->getCoord());
		}
		foreach($p1 as $key => $value)
		{
			foreach($value as $k => $val)
			{
				$this->map[$val['y']][$val['x']] = ' ';
			}
		}
		foreach($p2 as $key => $value)
		{
			foreach($value as $k => $val)
			{
				$this->map[$val['y']][$val['x']] = '*';
			}
		}
	}

	function addObstacle() {
		$i = 0;
		while ($i < 10)
		{
			$x = rand(10, WIDTH - 10);
			$y = rand(10, HEIGHT - 10);
			$this->map[$y][$x++] = 1;
			$this->map[$y][$x++] = 1;
			$this->map[$y][$x++] = 1;
			$this->map[$y][$x++] = 1;
			$this->map[$y][$x++] = 1;
			$i++;
		}
	}

	function getPlayer($x)
	{
		if ($x == 1)
		{
			print("==> Player1 <==\n");
			foreach($this->player1 as $elem)
			{
				$elem->list_weapons();
			}
		}
		else if ($x == 2)
		{
			print("==> Player2 <==\n");
			foreach($this->player2 as $elem)
			{
				$elem->list_weapons();
			}
		}
	}

	function outputMap() {
		$i = 0;
		$j = 0;
		while ($i < HEIGHT)
		{
			$j = 0;
			while ($j < WIDTH)
			{
				print($this->map[$i][$j]);
				$j++;
			}
			print("\n");
			$i++;
		}
	}

	function startGame() {
		$this->createMap(HEIGHT, WIDTH);
		$r1_x = rand(3, WIDTH / 2);
		$r1_y = rand(1, 10);
		while (($r2_x = rand(10, WIDTH / 2)) == $r1_x)
			continue;
		while (($r2_y = rand(1, 10)) == $r1_y)
			continue;
		$r3_x = rand(WIDTH / 2, WIDTH - 3);
		$r3_y = rand(HEIGHT - 11, HEIGHT - 1);
		while (($r4_x = rand(WIDTH / 2, WIDTH - 10)) == $r3_x)
			continue;
		while (($r4_y = rand(HEIGHT - 11, HEIGHT - 1)) == $r3_y)
			continue;
		$coord_v1 = array(array('x' => $r1_x, 'y' => $r1_y) ,array('x' => $r1_x + 1, 'y' => $r1_y));
		$coord_v2 = array(array('x' => $r2_x, 'y' => $r2_y) ,array('x' => $r2_x + 1, 'y' => $r2_y), array('x' => $r2_x + 2, 'y' => $r2_y), array('x' => $r2_x + 3, 'y' => $r2_y), array('x' => $r2_x + 4, 'y' => $r2_y), array('x' => $r2_x + 5, 'y' => $r2_y), array('x' => $r2_x + 6, 'y' => $r2_y), array('x' => $r2_x + 7, 'y' => $r2_y));
		$coord_v3 = array(array('x' => $r3_x, 'y' => $r3_y) ,array('x' => $r3_x + 1, 'y' => $r3_y));
		$coord_v4 =  array(array('x' => $r4_x, 'y' => $r4_y) ,array('x' => $r4_x + 1, 'y' => $r4_y), array('x' => $r4_x + 2, 'y' => $r4_y), array('x' => $r4_x + 3, 'y' => $r4_y), array('x' => $r4_x + 4, 'y' => $r4_y), array('x' => $r4_x + 5, 'y' => $r4_y), array('x' => $r4_x + 6, 'y' => $r4_y), array('x' => $r4_x + 7, 'y' => $r4_y));

		$v1 = new Scout();
		$v2 = new Amiral();
		$v1->setCoord($coord_v1);
		$v2->setCoord($coord_v2);

		$v3 = new Scout();
		$v4 = new Amiral();
		$v3->setCoord($coord_v3);
		$v4->setCoord($coord_v4);

		$this->player1 = array($v1, $v2);
		$this->player2 = array($v3, $v4);

		$this->addPlayers();

		$this->outputMap();
	}

	public function rotate($player_nb, $ship_nb) {
		if ($player_nb == 1)
		{
			$this->player1[$ship_nb]->rotate();
		}
		else if ($player_nb == 2)
		{
			$this->player2[$ship_nb]->rotate();
		}
	}
}
$game = new Game();
$game->startGame();
$game->getPlayer(1);
$game->getPlayer(2);
?>