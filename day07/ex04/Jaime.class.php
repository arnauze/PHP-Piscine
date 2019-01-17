<?php
class Jaime extends Lannister {
	public function sleepWith($arg) {
		if ($arg instanceof Lannister)
		{
			if ($arg instanceof Cersei)
				print("With pleasure, but only in a tower in Winterfell, then.\n");
			else
				print("Not even if I'm drunk !\n");
		}
		else
			print("Let's do this.\n");
	}
}
?>