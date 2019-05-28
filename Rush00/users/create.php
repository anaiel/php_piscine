<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/my_hash.php';
include $root.'/users/user_exists.php';
include $root.'/print_error.php';
session_start();

// [TO DO] Proteger contre les injections
// [TO DO] Ajouter max length
if (isset($_POST['lname'])
    && isset($_POST['fname'])
    && isset($_POST['email']) 
    && isset($_POST['passwd']) 
    && $_POST['submit'] == "OK") 
{
    /* Test that the values are acceptable */
    $ok = true;
    if (preg_match("/[^A-Za-zÀ-ÖØ-öø-ÿ -]/i", $_POST['lname'])) {
        $ok = false;
        $_POST['lname'] = "";
        $_SESSION['error_msg'][] = "Le nom ne peut comporter que des lettres, un espace ou un trait d'union.\n";
    }
    if (preg_match("/[^A-Za-zÀ-ÖØ-öø-ÿ -]/i", $_POST['fname'])) {
        $ok = false;
        $_POST['fname'] = "";
        $_SESSION['error_msg'][] = "Le prénom ne peut comporter que des lettres, un espace ou un trait d'union.\n";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $ok = false;
        $_POST['email'] = "";
        $_SESSION['error_msg'][] = "L'adresse email est invalide.\n";
    }
    if (user_exists($_POST['email'])) {
        $ok = false;
        $_POST['email'] = "";
        $_SESSION['error_msg'][] = "L'adresse email est déjà utilisée par un autre compte.\n";
    }
    if (strlen($_POST['passwd']) < 8 || !preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/", $_POST['passwd'])) {
        $ok = false;
        $_SESSION['error_msg'][] = "Le mot de passe doit faire au moins huit caractere et contenir au moins un chiffre, une lettre minuscule et une lettre majuscule.\n";
    }
    if ($_POST['passwd'] != $_POST['passwd_conf']) {
        $ok = false;
        $_SESSION['error_msg'][] = "Les mots de passe fournis sont différents.\n";
    }

    /* Create account if values are acceptable and redirect to success page */
    if ($ok) {
        $new_user = array(
            "passwd" => my_hash($_POST['passwd']),
            "lname" => $_POST['lname'],
            "fname" => $_POST['fname'],
            "email" => $_POST['email'],
            "id" => my_hash($_POST['email']));
        if (!is_dir($root."/private"))
            mkdir($root."/private");
        if (!file_exists($root."/private/users"))
            file_put_contents($root."/private/users", serialize(array($new_user)));
        else {
            $file = fopen($root."/private/users", "r+");
            if (flock($file, LOCK_EX)) {
                $usr_list = unserialize(file_get_contents($root."/private/users")); // [IDEA] Changer de facon de store les users pour qu'on puisse juste append le user a la suite sans devoir recuperer tout le contenu du fichier d'abord
                $usr_list[] = $new_user;
                file_put_contents($root."/private/users", serialize($usr_list));
            }
            else {
                $_SESSION['error_msg'][] = "L'utilisateur.rice n'a pas pu être créé.e.\n";
                $ok = false;
            }
            fclose($file);
        }
        if ($ok === true) {
            $_SESSION['success_msg'][] = "Le compte a été créé avec succès. Veuillez vous identifier pour accéder à votre espace personnel.\n";
            header('Location: /Rush0');
            exit ;
        }
    }
}

?>
<html>
<head>
    <title>Creer mon compte YAUQ</title>
    <link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
    <?php include $root.'/header.php'; ?>
    <div id="content">
        <?php print_error(); ?>
        <form method="post" action="create.php">
            Nom: <input type="text" name="lname" value="<?php echo $_POST['lname'] ?>" />
            <br />
            Prenom: <input type="text" name="fname" value="<?php echo $_POST['fname'] ?>" />
            <br />
            Email: <input type="text" name="email" value="<?php echo $_POST['email'] ?>" />
            <br />
            Mot de passe: <input type= "password" name="passwd" value="" />
            <br />
            Confirmer le mot de passe: <input type= "password" name="passwd_conf" value="" />
            <input type="submit" name="submit" value="OK" />
        </form>
    </div>
</body>
</html>