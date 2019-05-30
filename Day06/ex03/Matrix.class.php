<?php

require_once("Vertex.class.php");
require_once("Vector.class.php");

class Matrix {

	public static $verbose = false;
	const IDENTITY = 'IDENTITY', SCALE = 'SCALE', RX = 'Ox ROTATION',
			RY = 'Oy ROTATION', RZ = 'Oz ROTATION', TRANSLATION = 'TRANSLATION',
			PROJECTION = 'PROJECTION';
	const PRESET_LIST = array ( self::IDENTITY, self::SCALE, self::RX, self::RY,
			self::RZ, self::TRANSLATION, self::PROJECTION );
	const ROTATION_LIST = array ( self::RX, self::RY, self:: RZ );
	private $_matrix;
	private $_projZW = 0;


	/* Basic methods */

	public function __construct ( array $kwargs ) {
		/* In case we want a specific 4x4 matrix, for the mult method for instance */
		/* NB this is contradictory with the subject, but there is no other way */
		if ( array_key_exists('setMatrix', $kwargs)
				&& count($kwargs['setMatrix']) == 16)
		{
			$ok = true;
			foreach ( $kwargs['setMatrix'] as $val ) {
				if ( !is_numeric($val) ) {
					$ok = false;
					break ;
				}
			}
			if ( $ok ) {
				$this->_matrix = $kwargs['setMatrix'];

				if (self::$verbose === true)
					print ("Matrix instance constructed".PHP_EOL);

				return ;
			}
		}

		if (!array_key_exists('preset', $kwargs)
				|| !in_array($kwargs['preset'], self::PRESET_LIST)
				|| ($kwargs['preset'] == self::SCALE
						&& (!array_key_exists('scale', $kwargs)
								|| !is_numeric($kwargs['scale'])))
				|| (in_array($kwargs['preset'], self::ROTATION_LIST)
						&& (!array_key_exists('angle', $kwargs)
								|| !is_numeric($kwargs['angle'])))
				|| ($kwargs['preset'] == self::TRANSLATION
						&& (!array_key_exists('vtc', $kwargs)
								|| !($kwargs['vtc'] instanceof Vector)))
				|| ($kwargs['preset'] == self::PROJECTION
						&& (!array_key_exists('fov', $kwargs)
								|| !is_numeric($kwargs['fov'])
								|| !array_key_exists('ratio', $kwargs)
								|| !is_numeric($kwargs['ratio'])
								|| !array_key_exists('near', $kwargs)
								|| !is_numeric($kwargs['near'])
								|| !array_key_exists('far', $kwargs)
								|| !is_numeric($kwargs['far'])
				))) {
			print ("error: invalid construction parameter.".PHP_EOL);
			die ();
		}

		switch ($kwargs['preset']) {

			case self::IDENTITY:
				$this->_matrix = array( 1, 0, 0, 0,
										0, 1, 0, 0,
										0, 0, 1, 0,
										0, 0, 0, 1);
				break;

			case self::TRANSLATION:
				$this->_matrix = array( 1, 0, 0, $kwargs['vtc']->getX(),
										0, 1, 0, $kwargs['vtc']->getY(),
										0, 0, 1, $kwargs['vtc']->getZ(),
										0, 0, 0, 1);
				break;

			case self::SCALE:
				$this->_matrix = array( $kwargs['scale'], 0, 0, 0,
										0, $kwargs['scale'], 0, 0,
										0, 0, $kwargs['scale'], 0,
										0, 0, 0, 1);
				break;

			case in_array($kwargs['preset'], self::ROTATION_LIST):
				$axis = $this->_setAxis($kwargs['preset']);
				$this->_matrix = array ( 
					$axis['x'] * $axis['x'] * (1 - cos($kwargs['angle'])) + cos($kwargs['angle']),
					$axis['x'] * $axis['y'] * (1 - cos($kwargs['angle'])) - $axis['z'] * sin($kwargs['angle']),
					$axis['x'] * $axis['z'] * (1 - cos($kwargs['angle'])) + $axis['y'] * sin($kwargs['angle']),
					0,
					$axis['y'] * $axis['x'] * (1 - cos($kwargs['angle'])) + $axis['z'] * sin($kwargs['angle']),
					$axis['y'] * $axis['y'] * (1 - cos($kwargs['angle'])) + cos($kwargs['angle']),
					$axis['y'] * $axis['z'] * (1 - cos($kwargs['angle'])) - $axis['x'] * sin($kwargs['angle']),
					0,
					$axis['x'] * $axis['z'] * (1 - cos($kwargs['angle'])) - $axis['y'] * sin($kwargs['angle']),
					$axis['y'] * $axis['z'] * (1 - cos($kwargs['angle'])) + $axis['x'] * sin($kwargs['angle']),
					$axis['z'] * $axis['z'] * (1 - cos($kwargs['angle'])) + cos($kwargs['angle']),
					0,
					0, 0, 0, 1 );
				break;
			
			case self::PROJECTION:
				$this->_matrix = array (
					1 / ($kwargs['ratio'] * tan(deg2rad($kwargs['fov']) / 2)), 0, 0, 0,
					0, 1 / tan(deg2rad($kwargs['fov']) / 2), 0, 0,
					0, 0, ($kwargs['near'] + $kwargs['far']) / ($kwargs['near'] - $kwargs['far']),
							2 * $kwargs['far'] * $kwargs['near'] / ($kwargs['near'] - $kwargs['far']),
					0, 0, -1, 0 );
				break;
		}
		
		if ( self::$verbose === true )
			if ( $kwargs['preset'] == self::IDENTITY )
				print ("Matrix IDENTITY instance constructed".PHP_EOL);
			else
				print ("Matrix ".$kwargs['preset']." preset instance constructed".PHP_EOL);
		return;
	}

	public function __destruct () {
		if (self::$verbose === true)
			print ("Matrix instance destructed".PHP_EOL);
		return ;
	}

	public function __toString () {
		$header = "M | vtcX | vtcY | vtcZ | vtxO".PHP_EOL."-----------------------------".PHP_EOL;
		$x = sprintf("x | %.2f | %.2f | %.2f | %.2f", $this->_matrix['0'],
				$this->_matrix['1'], $this->_matrix['2'], $this->_matrix['3']);
		$y = sprintf("y | %.2f | %.2f | %.2f | %.2f", $this->_matrix['4'],
				$this->_matrix['5'], $this->_matrix['6'], $this->_matrix['7']);
		$z = sprintf("z | %.2f | %.2f | %.2f | %.2f", $this->_matrix['8'],
				$this->_matrix['9'], $this->_matrix['10'], $this->_matrix['11']);
		$w = sprintf("w | %.2f | %.2f | %.2f | %.2f", $this->_matrix['12'],
				$this->_matrix['13'], $this->_matrix['14'], $this->_matrix['15']);
		return $header.$x.PHP_EOL.$y.PHP_EOL.$z.PHP_EOL.$w;
	}

	public function doc () {
		return (file_get_contents("Matrix.doc.txt"));
	}

	/* Tool methods for construction */

	private function _setAxis ($preset) {
		switch ($preset) {
			case self::RX:
				return array( 'x' => 1, 'y' => 0, 'z' => 0 );
				break;
			case self::RY:
				return array( 'x' => 0, 'y' => 1, 'z' => 0 );
				break;
			case self::RZ:
				return array( 'x' => 0, 'y' => 0, 'z' => 1);
		}
		return;
	}

	/* Accessors */

	public function getMatrix () { return $this->_matrix; }

	/* Operation methods */

	public function mult ( Matrix $rhs ) {
		$rhsMatrix = $rhs->getMatrix();
		$i = 0;
		while ( $i < 4 ) {
			$j = 0;
			while ( $j < 4 ) {
				$res[$i * 4 + $j] = 0;
				$k = 0;
				while ( $k < 4 ) {
					$res[$i * 4 + $j] += $this->_matrix[$i * 4 + $k] * $rhsMatrix[$j + $k * 4];
					$k++;
				} 
				$j++;
			}
			$i++;
		}
		return new Matrix ( array( 'setMatrix' => $res ) );
	}

	public function transformVertex ( Vertex $vtx ) {
		return new Vertex ( array(
			'x' => $this->_matrix['0'] * $vtx->getX()
					+ $this->_matrix['1'] * $vtx->getY()
					+ $this->_matrix['2'] * $vtx->getZ() 
					+ $this->_matrix['3'] * $vtx->getW(),
			'y' => $this->_matrix['4'] * $vtx->getX()
					+ $this->_matrix['5'] * $vtx->getY()
					+ $this->_matrix['6'] * $vtx->getZ() 
					+ $this->_matrix['7'] * $vtx->getW(),
			'z' => $this->_matrix['8'] * $vtx->getX()
					+ $this->_matrix['9'] * $vtx->getY()
					+ $this->_matrix['10'] * $vtx->getZ() 
					+ $this->_matrix['11'] * $vtx->getW(),
			'w' => $this->_matrix['12'] * $vtx->getX()
					+ $this->_matrix['13'] * $vtx->getY()
					+ $this->_matrix['14'] * $vtx->getZ() 
					+ $this->_matrix['15'] * $vtx->getW()
		) );
	}

}

?>