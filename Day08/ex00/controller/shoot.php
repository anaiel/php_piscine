<?php

require_once("../model/Battlefield.class.php");
require_once("../model/Player.class.php");
require_once("../model/Direction.trait.php");
require_once("../model/ships/Ship.class.php");
require_once("../model/ships/HonorableDuty.class.php");
require_once("../model/ships/SwordOfAbsolution.class.php");
require_once("../model/Dice.trait.php");
require_once("../model/weapons/Weapon.class.php");
require_once("../model/weapons/FlankLasers.class.php");
require_once("../model/weapons/NavalSpear.class.php");

session_start();

if ( array_key_exists('x', $_POST)
        && is_numeric($_POST['x'])
        && array_key_exists('y', $_POST)
        && is_numeric($_POST['y'])
        && array_key_exists('submit', $_POST)
        && $_POST['submit'] == "ok"
        && $_SESSION['active_ship']->phase == Ship::SHOOT) {

    $weapon = $_SESSION['active_ship']->weapon;
    $weapon($_POST);
    
    $_SESSION['active_ship']->restoreSpeed();
    $_SESSION['active_ship']->changePhase(Ship::MOVE);
    $_SESSION['battlefield']->nextPlayer();
    $player = $_SESSION['battlefield']->getPlayer('active');
    $_SESSION['active_ship'] = $player->getShip();

}

try {
    if ( !is_numeric($_POST['x']) || !is_numeric($_POST['y']) )
        throw new Exception("Value must be numerical.", 32);
} catch ( Exception $exc ) {
    header( "refresh:5;url=/index.php" );
    print $exc.PHP_EOL;
    die();
}

header('Location: /index.php');
die();

?>