<?php
class UnholyFactory {

	private $_absorbed = array();

	public function absorb($soldat) {
		if ($soldat instanceof Fighter)
		{
			if ($this->_check_absorbed($soldat) == false)
				print("(Factory already absorbed a fighter of type ".$soldat->name.")\n");
			else
			{
				if (empty($this->_absorbed))
					$this->_absorbed = array($soldat);
				else
					array_push($this->_absorbed, $soldat);
				print("(Factory absorbed a fighter of type ".$soldat->name.")\n");
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)\n");
		}
	}

	public function fabricate($name) {
		if (($i = $this->_get_index($name)) == false)
			print("(Factory hasn't absorbed any fighter of type ".$name.")\n");
		else
		{
			print("(Factory fabricates a fighter of type ".$this->_absorbed[$i]->$name.")\n");
			return clone $this->_absorbed[$i];
		}
	}

	private function _check_absorbed($soldat) {
		foreach($this->_absorbed as $key => $value)
		{
			if ($value->name == $soldat->name)
				return false;
		}
		return true;
	}

	private function _get_index($name) {
		$i = 0;
		foreach($this->_absorbed as $key => $value)
		{
			if ($value->name == $name)
				return $i;
			$i++;
		}
		return false;
	}

}
?>