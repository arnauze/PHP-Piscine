<?php
class NightsWatch implements IFighter {

	private $_recruits = array();

	public function fight() {
		foreach($this->_recruits as $key => $value)
			$value->fight();
	}

	public function recruit( $var ) {
		if ($var instanceof IFighter)
		{
			if (empty($this->_recruits))
				$this->_recruits = array($var);
			else
				array_push($this->_recruits, $var);
		}
	}
}
?>