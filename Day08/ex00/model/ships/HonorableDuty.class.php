<?php

final class HonorableDuty extends Ship {
	protected static $_length = 4;
	protected static $_width = 1;
	protected static $_name = 'Honorable Duty';
	protected static $_speed = 15;
	protected static $_shell = 5;
	protected static $_shield = 0;
	protected static $_inertia = 4;
	
	/* Basic methods */

	static function doc () {
		return file_get_contents('HonorableDuty.doc.txt');
	}

	/* Methods */

	protected function _mountWeapon () {
		return new FlankLasers ( array( 'ship' => $this ) );
	}
	
}

?>