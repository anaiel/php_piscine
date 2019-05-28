<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root."/print_error.php";
include $root."/print_success.php";

/* ************** Apercu **************** */
// [TO DO] Montrer quelques articles

/* ************** Panier **************** */
// [TO DO] Panier

/* *************** Admin **************** */
// [TO DO] Link to admin

?>
<html>
<head>
    <title>Yauq - Le mobilier du nord depuis 2019</title>
    <link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
    <?php include $root."/header.php"; ?>
    <?php include $root."/nav_bar.php"; ?>
    <div id='content'>
        <?php print_error(); ?>
        <?php print_success(); ?>
        <div id='centerpiece'>Bienvenue</div>
        <!--<img src="/Rush0/images/home/fleurs.jpg">-->
        <!-- style="float:center;margin: 0 10px 20px"> -->
    </div>
    <?php include $root."/footer.php"?>
</body>
</html>