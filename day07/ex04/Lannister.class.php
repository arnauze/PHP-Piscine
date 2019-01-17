<?php
class Lannister {
	public function sleepWith($arg) {
		if ($arg instanceof Lannister)
			print("Not even if I'm drunk !\n");
		else
			print("Let's do this.\n");
	}
}
?>