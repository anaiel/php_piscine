<?php

require_once("Color.class.php");

class Vertex {

	public static $verbose = false;

	private $_x, $_y, $_z, $_w = 1.0, $_color;

	public function __construct (array $kwargs) {

		if (!array_key_exists('x', $kwargs)
				|| !array_key_exists('y', $kwargs)
				|| !array_key_exists('z', $kwargs)
				|| !is_numeric($kwargs['x'])
				|| !is_numeric($kwargs['y'])
				|| !is_numeric($kwargs['z'])
				|| (array_key_exists('w', $kwargs) && !is_numeric($kwargs['w']))
				|| (array_key_exists('color', $kwargs)
				&& !($kwargs['color'] instanceof Color))) {
			print ("error: invalid construction parameter");
			die ();
		}

		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color (array('rgb' => 0xffffff));
		if (self::$verbose === true)
			print($this." constructed".PHP_EOL);
		return;
		
	}

	public function __destruct () {
		if (self::$verbose === true)
			print($this." destructed".PHP_EOL);
		return;
	}

	public function __toString () {
		$coords = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose === true)
			return $coords.", ".$this->_color." )";
		else
			return $coords." )";
	}

	public function doc () {
		return file_get_contents("Vertex.doc.txt");
	}

	public function getX () { return $this->_x; }
	
	public function getY () { return $this->_y; }
	
	public function getZ () { return $this->_z; }
	
	public function getW () { return $this->_w; }
	
	public function getColor () { return $this->_color; }

	public function setX ($val) {
		if (!is_numeric($val)) {
			print ("error: invalid parameter '".$val."' in setX method.".PHP_EOL);
			die ();
		}
		$this->_x = $val;
		return ;
	}

	public function setY ($val) {
		if (!is_numeric($val)) {
			print ("error: invalid parameter '".$val."' in setY method.".PHP_EOL);
			die ();
		}
		$this->_y = $val;
		return ;
	}

	public function setZ ($val) {
		if (!is_numeric($val)) {
			print ("error: invalid parameter '".$val."' in setZ method.".PHP_EOL);
			die ();
		}
		$this->_z = $val;
		return ;
	}

	public function setW ($val) {
		if (!is_numeric($val)) {
			print ("error: invalid parameter '".$val."' in setW method.".PHP_EOL);
			die ();
		}
		$this->_w = $val;
		return ;
	}

	public function setColor (Color $val) {
		$this->_color = $val;
		return ;
	}

}

?>