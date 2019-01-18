<?php

class Harpon {
	
	use Weapon;

	static $verbose = false;

	public function __construct( array $kwargs ) {
		if ($this->_ft_check($kwargs))
		{
			$this->_charge = $kwargs['charge'];
			$this->_short_r = $kwargs['short range'];
			$this->_medium_r = $kwargs['medium range'];
			$this->_long_r = $kwargs['long range'];
			$this->_effect_zone = $kwargs['effect zone'];
			if (array_key_exists('name', $kwargs))
				$this->name = $kwargs['name'];
			if (self::$verbose)
				print("You created ".$this->name.PHP_EOL);
		}
		else
			die("Wrong arguments.".PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose)
			print("You lost ".$this->name.PHP_EOL);
	}

	private function _ft_check(array $kwargs) {
		if (array_key_exists('charge', $kwargs) && array_key_exists('short range', $kwargs) && array_key_exists('medium range', $kwargs) && array_key_exists('long range', $kwargs) && array_key_exists('effect zone', $kwargs))
			return true;
		return false;
	}
}

?>