<?php

class Targaryen {
	public function getBurned() {
		if (static::resistsFire())
			return("emerges nakes but unharmed");
		else
			return("burns alive");
	}

	public function resistsFire() {
		return false;
	}
}
?>