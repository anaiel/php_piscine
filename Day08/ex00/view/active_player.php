<?php

require_once("./model/Battlefield.class.php");
require_once("./model/ships/Ship.class.php");
require_once("./model/ships/HonorableDuty.class.php");
require_once("./model/Player.class.php");
session_start();

$player = $_SESSION['battlefield']->getPlayer('active');

?>
<div id="active_player">
    <h2><?php echo $player->getName(); ?></h2>
    <div id="ship_info">
        <?php echo $_SESSION['active_ship']; ?><br />
        Speed: <?php echo $_SESSION['active_ship']->mvmtLeft." / ".$_SESSION['active_ship']->getSpeed(); ?><br />
        Phase: <?php echo $_SESSION['active_ship']->phase; ?>
    </div>
    <div id="movement">
        <a href="/controller/move/up.php">↑</a><br />
        <a href="/controller/move/left.php">←</a> <a href="/controller/move/down.php">↓</a> <a href="/controller/move/right.php">→</a><br />
        <a href="/controller/move/end.php">END</a><br />
    </div>
    <div id="shooting">
        <form action='/controller/shoot.php' method='post'>
            x: <input type='text' name='x' /><br />
            y: <input type='text' name='y' /><br />
            <input type='submit' name='submit' value='ok' />
        </form>
    </div>
</div>