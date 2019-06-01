<?php

abstract class Ship {

    protected $_data;
    protected static $_name, $_length, $_width, $_speed, $_shield, $_shell, $_inertia;
	const MOVE = 'move', SHOOT = 'shoot';
	
	use Direction;

	/* Basic methods */

	public function __construct ( array $kwargs ) {
		if ( !array_key_exists('owner', $kwargs)
			|| !($kwargs['owner'] instanceof Player)
			|| !array_key_exists('bttlfld', $kwargs)
			|| !($kwargs['bttlfld'] instanceof Battlefield) ) {
			/* [TO DO] Error handling (rajouter une protect si jamais width et length ont pas ete definis) */
			die ();
		}

		$this->_data = array(
				'owner' => $kwargs['owner'],
				'bttlfld' => $kwargs['bttlfld'],
				'mvmtLeft' => static::$_speed,
				'shieldLeft' => static::$_shield,
				'shellLeft' => static::$_shell,
        		'weapon' => $this->_mountWeapon(),
        		'coordinates' => null,
				'phase' => self::MOVE,
				'inertiaLeft' => 0
		);

		return ;
	}

	public function __destruct () {
		return ;
	}

	public function __toString () {
		$string = 			"Ship: ".static::$_name." (".$this->_data['shellLeft']." / ".static::$_shell.")<br />";
		$string = $string.	"Shield: ".$this->_data['shieldLeft']." / ".static::$_shield."<br />";
		$string = $string.	"Weapon: ".$this->_data['weapon']->getName();
		return $string;
	}

	static function doc () {
		return file_get_contents('Ship.doc.txt');
	}

    /* Accessors */
    
    public function __get ( $info ) {
        if ( !array_key_exists($info , $this->_data) ) {
            /* [IMPROVE] Gestion d'erreur */
            echo "error: unable to retrieve information '".$info."' from Ship instance.";
            die();
        }
        return $this->_data[$info];
    }

	public function getName () { return static::$_name; }

	public function getSpeed () { return static::$_speed; }

	public function getShield () { return static::$_shield; }

	public function getShell () { return static::$_shell; }

	/* Methods */

	public function arriveOnBattlefield () {
		switch ( $this->_data['owner']->getNumber() ) {
			case 1:
				$this->_data['direction'] = right;
				$this->_data['position'] = $this->changeDirection('right');
				$newCoordinates = array('x' => static::$_length,
										'y' => static::$_length );
				$this->_updateShipPosition($newCoordinates);
				break;
			case 2:
				$this->_data['direction'] = left;
				$this->_data['position'] = $this->changeDirection('left');
				$newCoordinates = array('x' => Battlefield::HEIGHT - static::$_length - 1,
										'y' => Battlefield::WIDTH - static::$_length - 1 );
				$this->_updateShipPosition($newCoordinates);
				break;
		}
		return;
	}

	private function _updateShipPosition ( array $newCoords ) {
		if ( !array_key_exists('x', $newCoords)
			|| !is_numeric($newCoords['x'])
			|| !array_key_exists('y', $newCoords)
			|| !is_numeric($newCoords['y']) ) {
			/* [IMPROVE] Gestion d'erreur */
			echo "error: wrong argument in _updateShipPosition method in Ship class\n";
			die();
		}

		/* Empty previous coordinates */
		if ( $this->_data['coordinates'] != null ) {
			$this->_data['bttlfld']->battlefield[$this->_data['coordinates']['x']][$this->_data['coordinates']['y']] = null;
			foreach ( $this->_data['position'] as $part ) {
				$this->_data['bttlfld']->battlefield[$this->_data['coordinates']['x'] + $part['x']][$this->_data['coordinates']['y'] + $part['y']] = null;
			}
		}
		/* Fill new coordinates */
		$this->_data['bttlfld']->battlefield[$newCoords['x']][$newCoords['y']] = $this;
		foreach ( $this->_data['position'] as $part ) {
			$this->_data['bttlfld']->battlefield[$newCoords['x'] + $part['x']][$newCoords['y'] + $part['y']] = $this;
		}
		$this->_data['coordinates'] = $newCoords;
		return;
	}

	public function move ( array $coords ) {
		if (!array_key_exists('x', $coords)
				|| !is_numeric($coords['x'])
				|| !array_key_exists('y', $coords)
				|| !is_numeric($coords['y'])) {
			/* [IMPROVE] Gestion d'erreur */
			echo "error: invalid movement coordinates";
			die();
		}

		$newCoords = array( 'x' => $this->_data['coordinates']['x'] + $coords['x'],
							'y' => $this->_data['coordinates']['y'] + $coords['y']);
		/* [TO DO] Gestion des collisions */
		if ( $newCoords['x'] < Battlefield::HEIGHT
				&& $newCoords['y'] < Battlefield::WIDTH
				&& ($this->_data['bttlfld']->battlefield[$newCoords['x']][$newCoords['y']] == null
				||  $this->_data['bttlfld']->battlefield[$newCoords['x']][$newCoords['y']] === $this) ) {
			$this->_updateShipPosition($newCoords);
			$this->_data['mvmtLeft'] = $this->_data['mvmtLeft'] - 1;
			if ( $this->_data['mvmtLeft'] == 0 )
				$this->_data['phase'] = self::SHOOT;
		}

		return;
	}

	public function changePhase ( $newPhase ) {
		if ( $newPhase != self::MOVE
				&& $newPhase != self::SHOOT ) {
			/* [IMPROVE] Gestion d'erreur */
			echo "error: incorrect phase change in Ship class.\n";
			die();
		}

		$this->_data['phase'] = $newPhase;
		
		return;
	}

	public function takeHit ( $damage ) {
		if ( !is_numeric($damage) ) {
			/* [IMPROVE] Gestion d'erreur */
			echo "error: incorrect damage parameter in takeHit method in Ship class\n";
			die();
		}
		while ( $damage > 0 && $this->_data['shieldLeft'] > 0 ) {
			$this->_data['shieldLeft']--;
			$damage--;
		}
		while ( $damage > 0 ) {
			$this->_data['shellLeft']--;
			$damage--;
		}
		/* [TO DO] Destruction du vaisseau */;
		
		return;
	}

	public function restoreSpeed() {
		$this->_data['mvmtLeft'] = static::$_speed;
		return;
	}

	public function steer ( $direction ) {
		$this->_data['direction'] = $direction;
		$coords = $this->_data['coordinates'];
		foreach ( $this->_data['position'] as $part ) {
			$this->_data['bttlfld']->battlefield[$coords['x'] + $part['x']][$coords['y'] + $part['y']] = null;
		}
		$this->_data['position'] = $this->changeDirection($direction);
		foreach ( $this->_data['position'] as $part ) {
			$this->_data['bttlfld']->battlefield[$coords['x'] + $part['x']][$coords['y'] + $part['y']] = $this;
		}
		return;
	}

	abstract protected function _mountWeapon ();

}

?>