<?php

require_once('../Classes/classes/Amiral.class.php');
require_once('../Classes/classes/Harpon.class.php');
require_once('../Classes/classes/MegaLaser.class.php');
require_once('../Classes/classes/Scout.class.php');
require_once('../Classes/classes/Spaceship.class.php');
require_once('../Classes/classes/Weapon.class.php');

define("WIDTH", 75);
define("HEIGHT", 50);

class Game {

	public $map = array();

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

	function addPlayers($player1, $player2) {
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
		$r1_x = rand(1, 10);
		$r1_y = rand(1, 10);
		while (($r2_x = rand(1, 10)) == $r1_x)
			continue;
		while (($r2_y = rand(1, 10)) == $r1_y)
			continue;
		$r3_x = rand(WIDTH - 18, WIDTH - 8);
		$r3_y = rand(HEIGHT - 10, HEIGHT);
		while (($r4_x = rand(WIDTH - 18, WIDTH - 8)) == $r3_x)
			continue;
		while (($r4_y = rand(HEIGHT - 10, HEIGHT)) == $r3_y)
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

		$p1 = array($v1, $v2);
		$p2 = array($v3, $v4);

		$this->addPlayers($p1, $p2);

		$this->outputMap();
	}
}

$game = new Game();

$game->startGame();

?>