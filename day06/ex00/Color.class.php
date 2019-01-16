<?php

class Color {

	static $verbose = false;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function __construct( array $kwargs ) {
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = intval($kwargs['rgb']) >> 16 & 0x0ff;
			$this->green = intval($kwargs['rgb']) >> 8 & 0x0ff;
			$this->blue = intval($kwargs['rgb']) & 0x0ff;
		}
		else if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs))
		{
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose)
				print("Color( red: $this->red, green:   $this->green, blue:   $this->blue ) constructed.\n");
		return ;
	}

	public function __destruct() {
		if (self::$verbose)
			print("Color( red: $this->red, green:   $this->green, blue:   $this->blue ) destructed.\n");
		return ;
	}

	public function __toString() {
		return ("Color( red: $this->red, green:   $this->green, blue:   $this->blue )");
	}

	static function doc() {
		print(file_get_contents('Color.doc.txt'));
		return ;
	}

	public function add( $other ) {
		return new Color(array( "red" => ($this->red + $other->red), "green" => ($this->green + $other->green), "blue" => ($this->blue + $other->blue) ));
	}

	public function sub( $other ) {
		return new Color(array( "red" => $this->red - $other->red, "green" => $this->green - $other->green, "blue" => $this->blue - $other->blue ));
	}

	public function mult( $f ) {
		return new Color(array( "red" => $this->red * $f, "green" => $this->green * $f, "blue" => $this->blue * $f ));
	}
}
?>