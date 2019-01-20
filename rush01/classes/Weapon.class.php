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
			if ($key['y'] > $max_y)
				$max_y = $key['y'];
			if ($key['y'] < $min_y)
				$min_y = $key['y'];
		}
		if ($this instanceof Harpon)
		{
			if ($coord['direction']['right'] == 1)
			{
				while ($i < $this->_long_r)
				{
					if ($map[$min_y][$max_x + $i] != 0)
						return true;
					$i++;
				}
			}
			else if ($coord['direction']['up'] == 1)
			{
				while ($i < $this->_long_r)
				{
					if ($map[$min_y - $i][$max_x] != 0)
						return true;
					$i++;
				}
			}
			else if ($coord['direction']['left'] == 1)
			{
				while ($i < $this->_long_r)
				{
					if ($map[$min_y][$min_x - $i] != 0)
						return true;
					$i++;
				}
			}
			else if ($coord['direction']['down'] == 1)
			{
				while ($i < $this->_long_r)
				{
					if ($map[$max_y + $i][$max_x] != 0)
						return true;
					$i++;
				}
			}
		}
		else if ($this instanceof MegaLaser)
		{
			if ($coord['direction']['right'] == 1)
			{
				while ($i < $this->_long_r)
				{
					$j = $min_x;
					while ($j <= $max_x)
					{
						if ($map[$min_y - $i][$j] != 0)
							return true;
						$j++;
					}
					$i++;
				}
			}
			else if ($coord['direction']['up'] == 1)
			{
				while ($i < $this->_long_r)
				{
					$j = $min_y;
					while ($j <= $max_y)
					{
						if ($map[$j][$max_x - $i] != 0)
							return true;
						$j++;
					}
					$i++;
				}
			}
			else if ($coord['direction']['left'] == 1)
			{
				while ($i < $this->_long_r)
				{
					$j = $min_x;
					while ($j <= $max_x)
					{
						if ($map[$min_y + $i][$j] != 0)
							return true;
						$j++;
					}
					$i++;
				}
			}
			else if ($coord['direction']['down'] == 1)
			{
				while ($i < $this->_long_r)
				{
					$j = $min_y;
					while ($j <= $max_y)
					{
						if ($map[$j][$max_x + $i] != 0)
							return true;
						$j++;
					}
					$i++;
				}
			}
		}
		return false;
	}
}

?>