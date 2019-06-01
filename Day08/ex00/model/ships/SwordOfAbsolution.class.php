<?php

final class SwordOfAbsolution extends Ship {
	protected static $_length = 3;
	protected static $_width = 1;
	protected static $_name = 'Sword of Absolution';
	protected static $_speed = 18;
	protected static $_shell = 4;
	protected static $_shield = 0;
	protected static $_inertia = 3;
	
	/* Basic methods */

	static function doc () {
		return file_get_contents('SwordOfAbsolution.doc.txt');
	}
	
	/* Methods */

	protected function _mountWeapon () {
		return new NavalSpear ( array( 'ship' => $this ) );
	}

}

?>