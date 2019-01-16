<?php

require_once('../ex00/Color.class.php');

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = false;

	public function __construct( array $kwargs ) {
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
			if (array_key_exists('w', $kwargs))
				$this->_w = $kwargs['w'];
			else
				$this->_w = 1.0;
			if (array_key_exists('color', $kwargs) && $kwargs['color'] instanceof Color)
					$this->_color = $kwargs['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			if (self::$verbose)
			{
				print("Vertex( x: ".number_format($this->_x, 2)." y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w:".number_format($this->_w, 2).", Color( red: ".$this->_color->red.", green: ".$this->_color->green.", blue: ".$this->_color->blue." ) ) constructed\n"); 
			}
		}
		else
		{
			if (self::$verbose)
				die("Tried to create an instance Vertex() with the wrong arguments\n");
		}
	}

	public function __destruct() {
		if (self::$verbose)
			print("Vertex( x: ".number_format($this->_x, 2)." y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w:".number_format($this->_w, 2).", Color( red: ".$this->_color->red.", green: ".$this->_color->green.", blue: ".$this->_color->blue." ) ) destructed\n");
	}

	public function __toString() {
		print("Vertex( x: $this->_x, y: $this->_y, z: $this->_z, w:$this->_w"); 
		if (self::$verbose)
			print(", Color( red: ".$this->_color->red.", green: ".$this->_color->green.", blue: ".$this->_color->blue.")");
		return (")");
	}

	static function doc() {
		print(file_get_contents('Vertex.doc.txt'));
		return ;
	}

	public function setX( $new_x ) {
		$this->_x = $new_x;
	}

	public function setY( $new_y ) {
		$this->_y = $new_y;
	}

	public function setZ( $new_z ) {
		$this->_z = $new_z;
	}

	public function setW( $new_w ) {
		$this->_w = $new_w;
	}

	public function setColor( $new_col ) {
		$this->_color = $new_col;
	}

	public function getX() {
		return ($this->_x);
	}

	public function getY() {
		return ($this->_y);
	}

	public function getZ() {
		return ($this->_z);
	}

	public function getW() {
		return ($this->_w);
	}

	public function getColor() {
		return ($this->_color);
	}
}
?>