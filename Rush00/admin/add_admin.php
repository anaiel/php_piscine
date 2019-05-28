<?

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/my_hash.php';
include $root.'/users/user_exists.php';
include $root.'/print_error.php';
session_start();

// [TO DO] Proteger contre les injections
// [TO DO] Ajouter max length
if ($_POST['submit'] == "OK") 
{
	/* Test that the values are acceptable */
	$ok = true;
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$ok = false;
		$_POST['email'] = "";
		$_SESSION['error_msg'][] = "L'adresse email est invalide.\n";
	}
	if (strlen($_POST['passwd']) < 8 || !preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/", $_POST['passwd'])) {
		$ok = false;
		$_SESSION['error_msg'][] = "Le mot de passe doit faire au moins huit caractere et contenir au moins un chiffre, une lettre minuscule et une lettre majuscule.\n";
	}

	/* Create account if values are acceptable and redirect to success page */
	if ($ok === true) {
		$new_admin = array(
			"passwd" => my_hash($_POST['passwd']),
			"email" => $_POST['email'],
			"admin" => true,
			"id" => my_hash($_POST['email']));
		$file = fopen($root."/private/users", "r+");
		if (flock($file, LOCK_EX)) {
			/* If accounts already exists, add admin status */
			$usr_list = unserialize(file_get_contents($root."/private/users"));
			foreach ($usr_list as $key=>$user) {
				if ($user['email'] == $_POST['email']) {
					$usr_list[$key]['admin'] = true;
					$ok = false;
					$_SESSION['success_msg'][] = "Les droits d'administration ont été ajoutés à cet.te utilisateur.rice.\n";
					break;
				}
			}
			/* If account doesn't exist, create new admin user */
			if ($ok === true) {
				$usr_list = unserialize(file_get_contents($root."/private/users"));
				$usr_list[] = $new_admin;
				file_put_contents($root."/private/users", serialize($usr_list));
				$_SESSION['success_msg'][] = "Le.a nouvel.le administrateur.rice a été créé.e.\n";
			}
		}
		else {
			$_SESSION['error_msg'][] = "L'admin n'a pas pu être créé.e.\n";
			$ok = false;
		}
		fclose($file);
	}
}

header('Location: /Rush0');
exit ;

?>