<?php

require_once("../../model/Battlefield.class.php");
require_once("../../model/Direction.trait.php");
require_once("../../model/ships/Ship.class.php");
require_once("../../model/ships/HonorableDuty.class.php");
require_once("../../model/ships/SwordOfAbsolution.class.php");
require_once("../../model/Player.class.php");
session_start();

if ( $_SESSION['active_ship']->phase == Ship::MOVE ) {
    if ($_SESSION['active_ship']->direction != 'up')
        $_SESSION['active_ship']->steer('up');
    $_SESSION['active_ship']->move(array( 'x' => -1, 'y' => 0 ));
}

header('Location: /index.php');
die();

?>