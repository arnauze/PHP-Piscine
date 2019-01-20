<?php

require_once('Weapon.class.php');

class Harpon {
	
	use Weapon;

	static $verbose = false;

	public function __construct() {
		$this->_charge = 0;
		$this->_short_r = 30;
		$this->_medium_r = 60;
		$this->_long_r = 90;
		$this->_effect_zone = "Small laser beam (1x1) sent from the front of the spaceship.".PHP_EOL;
		$this->name = "Harpon";
		if (self::$verbose)
			print("You created ".$this->name.PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose)
			print("You lost ".$this->name.PHP_EOL);
	}
}

?>