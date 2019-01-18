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
}

?>