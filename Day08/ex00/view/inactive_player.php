<?php

require_once("./model/Battlefield.class.php");
require_once("./model/ships/Ship.class.php");
require_once("./model/ships/HonorableDuty.class.php");
require_once("./model/Player.class.php");
session_start();

$player = $_SESSION['battlefield']->getPlayer('inactive');
$ship = $player->getShip();

?>
<div id="inactive_player">
    <h2><?php echo $player->getName(); ?></h2>
    <?php echo $ship ?>
</div>