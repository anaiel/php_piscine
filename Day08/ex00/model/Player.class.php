<?php

class Player {

	public static $verbose = false;
	private static $_totalPlayers = 0;

	private	$_name;
	private	$_number;
	private	$_ship;
	private $_bttlfld;

	/* Basic methods */

	public function __construct ( array $kwargs ) {
		if (!array_key_exists('name', $kwargs)
			|| !is_string($kwargs['name'])
			|| self::$_totalPlayers > 1
			|| !array_key_exists('bttlfld', $kwargs)
	 		|| !($kwargs['bttlfld'] instanceof Battlefield) ) {
			/* [IMPROVE] Error handling */
			echo "error: incorrect construction parameter in Player construction";
			die ();
		}

		$this->_name = $kwargs['name'];
		self::$_totalPlayers++;
		$this->_number = self::$_totalPlayers;
		$this->_bttlfld = $kwargs['bttlfld'];

		/* Get ship */
		$this->_ship = $this->_getShip();
		/* Place ship on battlefield */
		$this->_ship->arriveOnBattlefield();

		if (self::$verbose === true)
			print("Player ".$this->_name." enters the game".PHP_EOL); // [TO DO] Meilleur message
		return;
	}

	public function __destruct () {
		if (self::$verbose === true)
			print("Player ".$this->_name." enters the game".PHP_EOL); // [TO DO] Meilleur message
	}

	/* Accessors */

	public function getNumber () { return $this->_number; }

	public function getName () { return $this->_name; }

	public function getShip () { return $this->_ship; }

	/* Methods */

	private function _getShip () {
		if ( $this->_number == 1 )
			return new HonorableDuty ( array( 'owner' => $this, 'bttlfld' => $this->_bttlfld, 'direction' => right ) );
		else
			return new SwordOfAbsolution ( array( 'owner' => $this, 'bttlfld' => $this->_bttlfld, 'direction' => left ) );
	}

}

?>