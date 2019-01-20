<?php

require_once('Weapon.class.php');

class MegaLaser {
	
	use Weapon;

	static $verbose = false;

	public function __construct() {
		$this->_charge = 0;
		$this->_short_r = 15;
		$this->_medium_r = 30;
		$this->_long_r = 45;
		$this->_effect_zone = "Laser the size of the battleship, launched in a straighline on the right or on the left.".PHP_EOL;
		$this->name = "MegaLaser";
		if (self::$verbose)
			print("You created ".$this->name.PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose)
			print("You lost ".$this->name.PHP_EOL);
	}
}

?>