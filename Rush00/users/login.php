<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/auth.php';

session_start();

if (isset($_POST['email']) && isset($_POST['passwd']) && $_POST['submit'] == "OK") { // [TO DO] Proteger contre les injections
	if (auth($_POST['email'], $_POST['passwd'])) {
		$_SESSION['logged_id'] = my_hash($_POST['email']);
		
		/* Populate session */
		$file = fopen($root."/private/users", "r");
    	if (flock($file, LOCK_SH)) {
			$usr_list = unserialize(file_get_contents($root."/private/users"));
			foreach ($usr_list as $user) {
				if ($user['id'] == $_SESSION['logged_id']) {
					$_SESSION['logged_lname'] = $user['lname'];
					$_SESSION['logged_fname'] = $user['fname'];
					/* Import cart */
					if (isset($user['cart'])) {
						$cart_file = fopen($root."/private/carts", "r");
						if (flock($cart_file, LOCK_SH)) {
							$carts = unserialize(file_get_contents($root."/private/carts"));
							$_SESSION['cart'] = array_merge($_SESSION['cart'], $carts[$user['cart']]); // [TO DO] Marche plus avec le nouveau systeme
						}
						else
							$_SESSION['error_msg'][] = "Impossible de telecharger le panier.\n";
						fclose($cart_file);
					}
					break ;
				}
        	}
		}
		fclose($file);

	}
	else
		$_SESSION['error_msg'][] = "Login ou mot de passe inconnu.\n"; // [IMPROVE] Faire un meilleur message d'erreur
}

header('Location: /Rush0');

?>