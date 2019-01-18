<?php

require_once('Spaceship.class.php');

class Amiral {
	use Spaceship;
	// Outputs informations if set to true
	static $verbose = false;

	// Constructor of the class. Checks if we received all the arguments necessary then set the initial variables
	public function __construct() {
		$this->_name = "Amiral";
		$this->_size = 8;
		$this->_sprite = 'A';
		$this->_hull_points = 10;
		$this->_engine_power = 15;
		$this->_speed = 10;
		$this->_handling = 5;
		$this->_shield = 0;
		$this->_weapons = array( new MegaLaser() );
		if (self::$verbose)
			print("Battleship ".$this->_name." arrived on the battlefield.".PHP_EOL);
	}

	// Destructor of the class instance
	public function __destruct() {
		if (self::$verbose)
			print("Battleship ".$this->_name." died peacefully on the battlefield.".PHP_EOL);
	}

	public function setCoord(array $coord ) {
		$this->_coordinates = $coord;
	}

	public function getCoord() {
		return $this->_coordinates;
	}
}
?>