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

	public function getMaxX() {
		$max = 0;
		foreach($this->_coordinates as $key)
		{
			if ($key['x'] > $max)
				$max = $key['x'];
		}
		return $max;
	}

	public function getMinX() {
		$min = 99999;
		foreach($this->_coordinates as $key)
		{
			if ($key['x'] < $min)
				$min = $key['x'];
		}
		return $min;
	}

	public function getMinY() {
		$min = 99999;
		foreach($this->_coordinates as $key)
		{
			if ($key['y'] < $min)
				$min = $key['y'];
		}
		return $min;
	}

	public function getMaxY() {
		$max = 0;
		foreach($this->_coordinates as $key)
		{
			if ($key['y'] > $max)
				$max = $key['y'];
		}
		return $max;
	}

	public function move($n) {
		$coordinates = $this->getCoord();
		$new_coord = array();
	}

	public function rotate() {
		$i = 0;
		$coord = array();
		$width = ($this->getMaxX() - $this->getMinX()) + 1;
		$height = ($this->getMaxY() - $this->getMinY()) + 1;

		if ($width > 1 && $height == 1)
		{
			$middle_x = $this->getMinX() + floor($width / 2);
			$middle_y = $this->getMinY();
		}
		else if ($height > 1 && $width == 1)
		{
			$middle_y = $this->getMinY() + floor($height / 2);
			$middle_x = $this->getMinX();
		}

		$tmp = $width;
		$width = $height;
		$height = $tmp;

		if ($height > $width)
		{
			while ($i <= $width / 2 || $i <= $height / 2)
			{
				array_push($coord, array('x' => $middle_x, 'y' => $middle_y - $i));
				$i++;
			}
			$i = 1;
			while ($i <= $width / 2 || $i <= $height / 2)
			{
				array_push($coord, array('x' => $middle_x, 'y' => $middle_y + $i));
				$i++;
			}
		}
		else
		{
			while ($i <= $width / 2 || $i <= $height / 2)
			{
				array_push($coord, array('x' => $middle_x - $i, 'y' => $middle_y));
				$i++;
			}
			$i = 1;
			while ($i <= $width / 2 || $i <= $height / 2)
			{
				array_push($coord, array('x' => $middle_x + $i, 'y' => $middle_y));
				$i++;
			}
		}

		$this->setCoord($coord);
	}

}

?>