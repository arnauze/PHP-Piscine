<?php
require_once('Spaceship.class.php');

class Scout {

	use Spaceship;
	// Outputs informations if set to true
	static $verbose = false;

	// Constructor of the class. Checks if we received all the arguments necessary then set the initial variables
	public function __construct() {
		$this->_name = "Scout";
		$this->_size = 2;
		$this->_sprite = 'S';
		$this->_hull_points = 5;
		$this->_engine_power = 10;
		$this->_speed = 20;
		$this->_handling = 5;
		$this->_shield = 0;
		$this->_weapons = array( new Harpon() );
		if (self::$verbose)
			print("Battleship ".$this->_name." arrived on the battlefield.".PHP_EOL);
	}

	// Destructor of the class instance
	public function __destruct() {
		if (self::$verbose)
			print("Battleship ".$this->_name." died peacefully on the battlefield.".PHP_EOL);
	}
}
?>