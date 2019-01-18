<?php
class Scout {
	// Outputs informations if set to true
	static $verbose = false;

	// Constructor of the class. Checks if we received all the arguments necessary then set the initial variables
	public function __construct( array $kwargs ) {
		if ($this->_ft_check($kwargs))
		{
			$this->_name = $kwargs['name'];
			$this->_size = $kwargs['size'];
			$this->_sprite = $kwargs['sprite'];
			$this->_hull_points = $kwargs['hull points'];
			$this->_engine_power = $kwargs['engine power'];
			$this->_speed = $kwargs['speed'];
			$this->_handling = $kwargs['handling'];
			$this->_shield = $kwargs['shield'];
			$this->_weapons = $kwargs['weapons'];
			if (self::$verbose)
				print("Battleship ".$this->_name." arrived on the battlefield.".PHP_EOL);
		}
		else
			die("Missing arguments.".PHP_EOL);
	}

	// Destructor of the class instance
	public function __destruct() {
		if (self::$verbose)
			print("Battleship ".$this->_name." died peacefully on the battlefield.".PHP_EOL);
	}

	// Private function that ckecks if we received all the mandatory arguments in the constructor.
	private function _ft_check(array $kwargs) {
		if (!array_key_exists('name', $kwargs) || !array_key_exists('size', $kwargs) || !array_key_exists('sprite', $kwargs) || !array_key_exists('hull points', $kwargs) || !array_key_exists('engine power', $kwargs) || !array_key_exists('speed', $kwargs) || !array_key_exists('handling', $kwargs) || !array_key_exists('shield', $kwargs) || !array_key_exists('weapons', $kwargs))
			return false;
		return true;
	}
}
?>