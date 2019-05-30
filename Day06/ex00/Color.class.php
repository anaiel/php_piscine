<?php

class Color {

	public static $verbose = false;

	public $red;
	public $green;
	public $blue;

	public static function doc () {
		return file_get_contents("Color.doc.txt");
	}

	public function __construct ( array $kwargs ) {
		if (array_key_exists('rgb', $kwargs)) {
			if (!is_numeric($kwargs['rgb'])) {
				print("error: invalid construction parameters.".PHP_EOL);
				die();
			}
			$this->red = ((int)intval($kwargs['rgb']) >> 16) & 0xff;
			$this->green = ((int)intval($kwargs['rgb']) >> 8) & 0xff;
			$this->blue = (int)intval($kwargs['rgb']) & 0xff;
		}
		else {
			if (!array_key_exists('red', $kwargs)
					|| !array_key_exists('green', $kwargs)
					|| !array_key_exists('blue',$kwargs)
					|| !is_numeric($kwargs['red'])
					|| !is_numeric($kwargs['green'])
					|| !is_numeric($kwargs['blue'])) {
				print("error: invalid construction parameters.".PHP_EOL);
				die();
			}
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose === true)
			print ($this." constructed.".PHP_EOL);
		return ;
	}

	public function __destruct () {
		if (self::$verbose === true)
			print ($this." destructed.".PHP_EOL);
		return;
	}

	public function __toString () {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public function add (Color $color2) {
		$res = new Color  (array(
			'red' => $this->red + $color2->red,
			'green' => $this->green + $color2->green,
			'blue' => $this->blue + $color2->blue
		));
		return ($res);
	}

	public function sub (Color $color2) {
		$res = new Color  (array(
			'red' => $this->red - $color2->red,
			'green' => $this->green - $color2->green,
			'blue' => $this->blue - $color2->blue
		));
		return ($res);
	}

	public function mult ($fact) {
		if (!is_numeric($fact)) {
			print ("error: invalid parameter '".$fact. "' in mult method.".PHP_EOL);
			die ();
		}

		$res = new Color (array(
			'red' => intval($this->red * $fact),
			'green' => intval($this->green * $fact),
			'blue' => intval($this->blue * $fact)
		));
		return ($res);
	}

}

?>