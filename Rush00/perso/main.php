<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";


?>

<html>
<head>
	<title>YAUQ - <?php echo $_GET['category'];?></title>
	<link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
    <?php include $root.'/header.php'; ?>
	<?php include $root.'/nav_bar.php'; ?>
	<div id='modif_panier'>
    <a href="/Rush0/perso/panier.php"><img src="/Rush0/images/cart.png"></a>
    <a href="/Rush0/perso/modif.php"><img src="/Rush0/images/sliders-icon.png"></a>
    <br />
        <a class='panier' href="/Rush0/perso/cart.php"><font size="15">Accéder à mon panier</font></a>
        <a class="float_left" href="/Rush0/perso/modif.php"><font size="15">Modifier mon compte</font></a>
    </div>
</body>
