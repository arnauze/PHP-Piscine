<?php

require_once('../ex00/Color.class.php');
require_once('../ex01/Vertex.class.php');

class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	static $verbose = false;

	public function __construct( array $kwargs ) {
		if (array_key_exists('dest', $kwargs) && $kwargs['dest'] instanceof Vertex)
			$dest = $kwargs['dest'];
		else
		{
			if (self::$verbose)
				die("Arguments 'dest' is missing or not of type Vertex.\n");
		}
		if (array_key_exists('orig', $kwargs) && $kwargs['orig'] instanceof Vertex)
			$origin = $kwargs['orig'];
		else
			$origin = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0 ) );
		$this->_x = $dest->getX() - $origin->getX();
		$this->_y = $dest->getY() - $origin->getY();
		$this->_z = $dest->getZ() - $origin->getZ();
		$this->_w = 0.0;
		if (self::$verbose)
			print("Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2)." ) constructed\n");
	}

	public function __destruct() {
		if (self::$verbose)
			print("Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2)." ) destructed\n");
	}

	public function getX() {
		return $this->_x;
	}

	public function getY() {
		return $this->_y;
	}

	public function getZ() {
		return $this->_z;
	}

	public function getW() {
		return $this->_w;
	}

	public function __toString() {
		return ("Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2)." )");
	}

	static function doc() {
		print(file_get_contents('Vector.doc.txt'));
	}

	public function magnitude() {
		return (sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)));
	}

	public function normalize() {
		$length = $this->magnitude();
		if ($length == 1)
			return clone $this;
		else
			return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->_x / $length, 'y' => $this->_y / $length, 'z' => $this->_z / $length ) ) ) );
	}

	public function add( Vector $rhs ) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->_x + $rhs->getX(), 'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ() ) ) ) );
	}

	public function sub( Vector $rhs ) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->_x - $rhs->getX(), 'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ() ) ) ) );
	}

	public function opposite() {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1 ) ) ) );
	}

	public function scalarProduct( $k ) {
		return new Vector( array( 'dest' => new Vertex( array( 'x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k ) ) ) );
	}

	public function dotProduct( Vector $rhs ) {
		return (float)($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
	}

	public function cos( Vector $rhs ) {
		return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
	}

	public function crossProduct( Vector $rhs ) {
		return new Vector( array( 'dest' => new Vertex( array(
			'x' => ($this->_y * $rhs->getZ() - $this->_z * $rhs->getY()),
			'y' => ($this->_z * $rhs->getX() - $this->_x * $rhs->getZ()),
			'z' => ($this->_x * $rhs->getY() - $this->_y * $rhs->getX()) ) ) ) );
	}
}
?>