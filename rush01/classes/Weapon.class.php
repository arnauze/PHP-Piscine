<?php

trait Weapon {
	protected $_charge;
	protected $_short_r;
	protected $_medium_r;
	protected $_long_r;
	protected $_effect_zone;

	public function getProperties() {
		print("Charge: ".$this->_charge."\n");
		print("Short range: ".$this->_short_r."\n");
		print("Medium range: ".$this->_medium_r."\n");
		print("Long range: ".$this->_long_r."\n");
		print("Effect: ".$this->_effect_zone."\n");
	}

	public function inRange($map, $coord) {
		$min_x = 9999;
		$min_y = 9999;
		$max_x = 0;
		$max_y = 0;
		$i = 1;
		foreach($coord['coord'] as $key)
		{
			if ($key['x'] > $max_x)
				$max_x = $key['x'];
			if ($key['x'] < $min_x)
				$min_x = $key['x'];
		}
		foreach($coord['coord'] as $key)
		{
			if ($key['y'] > $max_y)
				$max_y = $key['y'];
			if ($key['y'] > $max_y)
				$max_y = $key['y'];
		}
		if ($this instanceof Harpon)
		{
			if ($coord['direction'] == 'right')
			{
				while ($i < $this->_long_r)
				{
					if ($map[$max_x + $i][$min_y] != 0 && $map[$max_x + $i][$min_y] != 1)
						return true;
					$i++;
				}
			}
			else if ($coord['direction'] == 'up')
			{
				while ($i < $this->_long_r)
				{
					if ($map[$max_x][$min_y - $i] != 0 && $map[$max_x][$min_y - $i] != 1)
						return true;
					$i++;
				}
			}
			else if ($coord['direction'] == 'left')
			{
				while ($i < $this->_long_r)
				{
					if ($map[$min_x - $i][$min_y] != 0 && $map[$min_x - $i][$min_y] != 1)
						return true;
					$i++;
				}
			}
			else if ($coord['direction'] == 'up')
			{
				while ($i < $this->_long_r)
				{
					if ($map[$max_x][$max_y + $i] != 0 && $map[$max_x + $i][$max_y + $i] != 1)
						return true;
					$i++;
				}
			}
		}
		// else if ($this instanceof MegaLaser)
		// {
		//		I need to add that one
		// }
		return false;
	}
}

?>