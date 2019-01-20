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
	protected $_direction = array('left' => 1, 'up' => 0, 'right' => 0,  'down' => 0);

	// Will use that to make a ship die in battle
	public $activated = true;

	public function setCoord(array $coord ) {
		$this->_coordinates = $coord;
	}

	public function getCoord() {
		return array('coord' => $this->_coordinates, 'direction' => $this->_direction);
	}

	private function _changeDirection() {
		if ($this->_direction['left'] == 1)
		{
			$this->_direction['left'] = 0;
			$this->_direction['up'] = 1;
		}
		else if ($this->_direction['up'] == 1)
		{
			$this->_direction['up'] = 0;
			$this->_direction['right'] = 1;
		}
		else if ($this->_direction['right'] == 1)
		{
			$this->_direction['right'] = 0;
			$this->_direction['down'] = 1;
		}
		else if ($this->_direction['down'] == 1)
		{
			$this->_direction['down'] = 0;
			$this->_direction['left'] = 1;
		}
	}

	public function getSprite() {
		return $this->_sprite;
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
		$min_x = $this->getMinX();
		$max_x = $this->getMaxX();
		$min_y = $this->getMinY();
		$max_y = $this->getMaxY();
		$i = 0;
		$coord = array();
		if ($this->getCoord()['direction']['left'] == 1)
		{
			while ($i <= ($max_x - $min_x))
			{
				array_push($coord, array('x' => $min_x - $n + $i, 'y' => $min_y));
				$i++;
			}
		}
		else if ($this->getCoord()['direction']['right'] == 1)
		{
			while ($i <= ($max_x - $min_x))
			{
				array_push($coord, array('x' => $min_x + $n + $i, 'y' => $min_y));
				$i++;
			}
		}
		else if ($this->getCoord()['direction']['up'] == 1)
		{
			while ($i <= ($max_y - $min_y))
			{
				array_push($coord, array('x' => $min_x, 'y' => $min_y - $n + $i));
				$i++;
			}
		}
		else if ($this->getCoord()['direction']['down'] == 1)
		{
			while ($i <= ($max_y - $min_y))
			{
				array_push($coord, array('x' => $min_x, 'y' => $min_y + $n + $i));
				$i++;
			}
		}
		$this->setCoord($coord);
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

		$this->_changeDirection();
		$this->setCoord($coord);
	}

	public function inRange($map) {
		if ($this->_weapons[0]->inRange($map, $this->getCoord()))
			return true;
		return false;
	}

}

?>