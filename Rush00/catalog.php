<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/print_error.php';
include $root.'/display_item.php';

/*Choice of category */
if (!isset($_GET['category']) || $_GET['category'] == "")
	$_GET['category'] = 'all'; // [IMPROVE] verifier que la categorie est valide

/* Add to cart */
if (isset($_POST['buy'])) {
	$_SESSION['cart'][$_POST['buy']] += 1;
}

?>
<html>
<head>
	<title>YAUQ - <?php echo $_GET['category'];?></title>
	<link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
	<?php include $root.'/header.php'; ?>
	<?php include $root.'/nav_bar.php'; ?>
	<div id='content'>
	<h2><?php echo $_GET['category']; ?></h2>
		<form name='acheter' method='post' action='catalog.php'><!-- [FIX ME] Quand on achete un truc on retombe sur la categorie all -->
			<?php
				$file = fopen($root."/catalog.csv", "r");
				if ($file === false) {
					$_SESSION['error_msg'][] = 'Impossible de charger le catalogue.';
					print_error();
				}
				else {
					fgetcsv($file, 0, ';');
					while (!feof($file)) {
						$item = fgetcsv($file, 0, ';');
						if (strlen($item[0]) && ($_GET['category'] == 'all' || preg_match('/'.$_GET['category'].'/i', $item[6]))) {
							display_item($item);
						}
					}
				}
				// [TO DO] Ajouter un message d'erreur si pas d'item correspondant a la categorie
			?>
		</form>
	</div>
	<?php include $root."/footer.php"?>
</body>