<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/print_error.php';
include $root.'/print_success.php';
include $root.'/users/my_hash.php';

/* Check if logged in user has admin rights */
$access_granted = false;
$file = fopen($root."/private/users", "r");
$ret = flock($file, LOCK_SH);
if ($ret === false)
$_SESSION['error_msg'][] = "wtf.\n";
if ($ret === true) {
    $user_list = unserialize(file_get_contents($root."/private/users"));
    foreach ($user_list as $user) {
        if ($_SESSION['logged_id'] == $user['id'] && $user['admin'] === true) {
            $access_granted = true;
            break ;
        }
    }
}
else
    $_SESSION['error_msg'][] = "Acces impossible aux donnees utilisateur.\n";
fclose ($file);
if ($access_granted === false) {
    $_SESSION['error_msg'][] = "Acces interdit.\n";
    header('Location: /Rush0');
    exit ;
}

?>
<html>
<head>
    <title>Administration</title>
    <link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>
    <div id="content">
        <?php print_error() ?>
        <?php print_success() ?>
        <div id='add_item'>
            Ajouter un produit:
            <form name='new_item' method='post' action='/Rush0/admin/new_item.php'>
                <table>
                    <tr>
                        <td>Rérérence</td>
                        <td><input type='txt' name='ref' value='' /></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td><input type='txt' name='name' value='' /></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type='txt' name='description' value='' /></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type='txt' name='image' value='' /></td>
                    </tr>
                    <tr>
                        <td>Prix</td>
                        <td><input type='txt' name='price' value='' /></td>
                    </tr>
                    <tr>
                        <td>Couleur</td>
                        <td><input type='txt' name='color' value='' /></td>
                    </tr>
                    <tr>
                        <td>Catégories</td>
                        <td><input type='txt' name='categories' value='' /></td>
                    </tr>
                </table>
                <input type='submit' name='submit' value='OK' />
            </form>
        </div>
        <div id='manage_users'>
            <div id='add_admin'>
                Ajouter un.e administrateur.rice :
                <form name='add_admin' method='post' action='/Rush0/admin/add_admin.php'>
                    <table>
                        <tr>
                            <td>Adresse mail</td>
                            <td><input type='text' name='mail' value='' /></td>
                        </tr>
                        <tr>
                            <td>Mot de passe</td>
                            <td><input type='password' name='passwd' value='' /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- [TO DO] Supprimer des utilisateurs -->
        </div>
        <div id='orders'><!-- [TO DO] Affichier les commandes validées, supprimer, modifier -->
        </div>
    </div>
</body>
</html>