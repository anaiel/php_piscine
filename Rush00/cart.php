<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'display_cart_item';

if (!isset($_SESSION['cart'])) {
    $_SESSION['error_msg'][] = "Le panier est vide.\n";
    header('Location: /Rush0');
}

?>
<html>
<head>
	<title>YAUQ - Mon Panier</title>
	<link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
	<?php include $root.'/header.php'; ?>
	<?php include $root.'/nav_bar.php'; ?>
	<div id='content'>
		<?php
            $file = fopen($root."catalog.csv", "r");
            if (flock($file, LOCK_SH)) {
                while (!feof($file)) {
                    $item = fgetcsv($file, 0, ';');
                    if (isset($_SESSION[$item[0]])) {
                        display_cart_item($item, $_SESSION[$item[0]]);
                    }
                }
            }
            fclose($file);
        ?>
		<a href='#'><div id='order'>Passer commande</div></a>
	</div>
    <?php include $root."/footer.php"?>
</body>