<?php

require_once("./model/Battlefield.class.php");
require_once("./model/Player.class.php");
require_once("./model/Direction.trait.php");
require_once("./model/ships/Ship.class.php");
require_once("./model/ships/HonorableDuty.class.php");
require_once("./model/ships/SwordOfAbsolution.class.php");
require_once("./model/Dice.trait.php");
require_once("./model/weapons/Weapon.class.php");
require_once("./model/weapons/FlankLasers.class.php");
require_once("./model/weapons/NavalSpear.class.php");

session_start();

if ( !array_key_exists('battlefield', $_SESSION) ) {
    $_SESSION['battlefield'] = new Battlefield;
    $_SESSION['battlefield']->newPlayer(new Player ( array( 'bttlfld' => $_SESSION['battlefield'], 'name' => "toto" ) )); 
    $_SESSION['battlefield']->newPlayer(new Player ( array( 'bttlfld' => $_SESSION['battlefield'], 'name' => "tata" ) ));
    $player = $_SESSION['battlefield']->getPlayer('active');
    $_SESSION['active_ship'] = $player->getShip();
}

?>
<html>
<head>
    <title>Awesome Starship Battles In The Dark Grim Future Of The Grim Dark 41st Millenium</title>
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>
<body>
    <?php include "./view/header.php"; ?>
    <div id="battlefield">
        <?php echo $_SESSION['battlefield']->display(); ?>
    </div>
    <?php include "./view/game_panel.php"; ?>
</body>
</html>
