<?php

require_once('../ex00/Color.class.php');
require_once('../ex01/Vertex.class.php');
require_once('../ex02/Vector.class.php');

class Matrix {
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "ROT X";
	const RY = "ROT Y";
	const RZ = "ROT Z";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";

	static $verbose = false;
	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;
	private $_matrix = array();
	private $_save = array();

	public function __construct( array $kwargs ) {
		if (!array_key_exists('preset', $kwargs))
		{
			if (self::$verbose)
				print("Arguments 'preset' is missing\n");
			exit();
		}
		$this->_preset = $kwargs['preset'];
		if (array_key_exists('scale', $kwargs))
			$this->_scale = $kwargs['scale'];
		if (array_key_exists('angle', $kwargs))
			$this->_angle = $kwargs['angle'];
		if (array_key_exists('vtc', $kwargs))
			$this->_vtc = $kwargs['vtc'];
		if (array_key_exists('fov', $kwargs))
			$this->_fov = $kwargs['fov'];
		if (array_key_exists('ratio', $kwargs))
			$this->_ratio = $kwargs['ratio'];
		if (array_key_exists('near', $kwargs))
			$this->_near = $kwargs['near'];
		if (array_key_exists('far', $kwargs))
			$this->_far = $kwargs['far'];
		if (array_key_exists('matrix', $kwargs) && is_array($kwargs['matrix']))
			$this->_save = $kwargs['matrix'];
		if ($this->_ft_check() == false)
			die("Wrong arguments\n");
		$this->_create_matrix();
	}

	static function doc() {
		print(file_get_contents("Matrix.doc.txt"));
	}

	public function __destruct() {
		if (self::$verbose)
			print("Matrix instance destructed\n");
		return ;
	}

	private function _ft_check() {
		if (empty($this->_preset))
			return false;
		else
		{ 
			if ($this->_preset == self::SCALE && empty($this->_scale))
				return false;
			else if (($this->_preset == self::RX || $this->_preset == self::RY || $this->_preset == self::RZ) && empty($this->_angle))
				return false;
			else if ($this->_preset == self::TRANSLATION && empty($this->_vtc))
				return false;
			else if ($this->_preset == self::PROJECTION && (empty($this->_fov) || empty($this->_ratio) || empty($this->_near) || empty($this->_far)))
				return false;
		}
		return true;
	}

	private function _build_matrix() {
		$i = 0;
		while ($i < 16)
		{
			$this->_matrix[$i] = 0;
			$i++;
		}
	}

	private function _create_matrix() {
		$this->_build_matrix();
		if ($this->_preset == self::IDENTITY)
		{
			$this->_ft_identity();
			if (self::$verbose)
				print("Matrix IDENTITY instance constructed\n");
		}
		else
		{
			if ($this->_preset == self::SCALE)
				$this->_ft_scale( $this->_scale );
			else if ($this->_preset == self::RX)
				$this->_ft_rotation_x();
			else if ($this->_preset == self::RY)
				$this->_ft_rotation_y();
			else if ($this->_preset == self::RZ)
				$this->_ft_rotation_z();
			else if ($this->_preset == self::TRANSLATION)
				$this->_ft_translation();
			else if ($this->_preset == self::PROJECTION)
				$this->_ft_projection();
			if (self::$verbose)
				print("Matrix ".$this->_preset." preset instance constructed\n");
		}
		if (!empty($this->_save))
			$this->_matrix = $this->_save;
	}

	private function _ft_identity() {
		$this->_matrix[0] = 1;
		$this->_matrix[5] = 1;
		$this->_matrix[10] = 1;
		$this->_matrix[15] = 1;
	}

	private function _ft_scale( $scale ) {
		$this->_matrix[0] = $scale;
		$this->_matrix[5] = $scale;
		$this->_matrix[10] = $scale;
		$this->_matrix[15] = 1;
	}

	private function _ft_rotation_x() {
		$this->_matrix[0] = 1;
		$this->_matrix[5] = cos($this->_angle);
		$this->_matrix[6] = -sin($this->_angle);
		$this->_matrix[9] = sin($this->_angle);
		$this->_matrix[10] = cos($this->_angle);
		$this->_matrix[15] = 1;
	}

	private function _ft_rotation_y() {
		$this->_matrix[0] = cos($this->_angle);
		$this->_matrix[2] = sin($this->_angle);
		$this->_matrix[5] = 1;
		$this->_matrix[8] = -sin($this->_angle);
		$this->_matrix[10] = cos($this->_angle);
		$this->_matrix[15] = 1;
	}

	private function _ft_rotation_z() {
		$this->_matrix[0] = cos($this->_angle);
		$this->_matrix[1] = -sin($this->_angle);
		$this->_matrix[4] = sin($this->_angle);
		$this->_matrix[5] = cos($this->_angle);
		$this->_matrix[10] = 1;
		$this->_matrix[15] = 1;
	}

	private function _ft_translation() {
		$this->_ft_identity();
		$this->_matrix[3] = $this->_vtc->getX();
		$this->_matrix[7] = $this->_vtc->getY();
		$this->_matrix[11] = $this->_vtc->getZ();
	}

	private function _ft_projection() {
		$this->_ft_identity();
		$this->_matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
		$this->_matrix[0] = $this->_matrix[5] / $this->_ratio;
		$this->_matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
		$this->_matrix[14] = -1;
		$this->_matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
		$this->_matrix[15] = 0;
	}

	public function __toString() {
		print("M | vtcX | vtcY | vtcZ | vtxO\n");
		print("-----------------------------\n");
		print("x | ".number_format($this->_matrix[0], 2)." | ".number_format($this->_matrix[1], 2)." | ".number_format($this->_matrix[2], 2)." | ".number_format($this->_matrix[3], 2)."\n");
		print("y | ".number_format($this->_matrix[4], 2)." | ".number_format($this->_matrix[5], 2)." | ".number_format($this->_matrix[6], 2)." | ".number_format($this->_matrix[7], 2)."\n");
		print("z | ".number_format($this->_matrix[8], 2)." | ".number_format($this->_matrix[9], 2)." | ".number_format($this->_matrix[10], 2)." | ".number_format($this->_matrix[11], 2)."\n");
		print("w | ".number_format($this->_matrix[12], 2)." | ".number_format($this->_matrix[13], 2)." | ".number_format($this->_matrix[14], 2)." | ".number_format($this->_matrix[15], 2));
		return ("");
	}

	public function mult( Matrix $rhs ) {
		$tmp = array();
		for ($i = 0; $i < 16; $i += 4) {
			for ($j = 0; $j < 4; $j++) {
				$tmp[$i + $j] = 0;
				$tmp[$i + $j] += $this->_matrix[$i + 0] * $rhs->_matrix[$j + 0];
				$tmp[$i + $j] += $this->_matrix[$i + 1] * $rhs->_matrix[$j + 4];
				$tmp[$i + $j] += $this->_matrix[$i + 2] * $rhs->_matrix[$j + 8];
				$tmp[$i + $j] += $this->_matrix[$i + 3] * $rhs->_matrix[$j + 12];
			}
		}
		return new Matrix(array('preset' => Matrix::IDENTITY, 'matrix' => $tmp));
	}

	public function transformVertex( Vertex $vtx ) {
		$tmp = array();
        $tmp['x'] = ($vtx->getX() * $this->_matrix[0]) + ($vtx->getY() * $this->_matrix[1]) + ($vtx->getZ() * $this->_matrix[2]) + ($vtx->getW() * $this->_matrix[3]);
        $tmp['y'] = ($vtx->getX() * $this->_matrix[4]) + ($vtx->getY() * $this->_matrix[5]) + ($vtx->getZ() * $this->_matrix[6]) + ($vtx->getW() * $this->_matrix[7]);
        $tmp['z'] = ($vtx->getX() * $this->_matrix[8]) + ($vtx->getY() * $this->_matrix[9]) + ($vtx->getZ() * $this->_matrix[10]) + ($vtx->getW() * $this->_matrix[11]);
        $tmp['w'] = ($vtx->getX() * $this->_matrix[11]) + ($vtx->getY() * $this->_matrix[13]) + ($vtx->getZ() * $this->_matrix[14]) + ($vtx->getW() * $this->_matrix[15]);
        $tmp['color'] = $vtx->getColor();
        $vertex = new Vertex($tmp);
        return $vertex;
	}
}
?>