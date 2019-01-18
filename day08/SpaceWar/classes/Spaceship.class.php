<?php

trait Spaceship {

	// Initial variables of the instance
	protected $_name;
	protected $_size;
	protected $_sprite;
	protected $_hull_points;
	protected $_engine_power;
	protected $_speed;
	protected $_handling;
	protected $_shield;
	protected $_weapons = array();

	// Variables used for the Order phase
	private $_extra_speed;
	private $_extra_shoot;
	private $_is_stationary;

	// Variables initialized during the Movements phase
	private $_last_move;

	// Position on the map
	protected $_coordinates = array();

	public function setCoord(array $coord ) {
		$this->_coordinates = $coord;
	}

	public function getCoord() {
		return $this->_coordinates;
	}

	public function list_weapons() {
		foreach($this->_weapons as $value)
		{
			print("Battleship type: ".$this->_name)."\n";
			$value->getProperties();
		}
	}

}

?>