<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root."/print_error.php";
session_start();

/* Add current cart to user temporary cart if user logs out */
// [IMPROVE] Pas efficace si un utilisateur se casse sans se logout : il peut perdre son cart si la session expire
if (isset($_SESSION['cart']) && isset($_SESSION['logged_id'])) {

    $file = fopen($root."/private/users", "r");
    if (flock($file, LOCK_EX)) {

        /* Get the index of the user currently logged in */
        $usr_list = unserialize(file_get_contents($root."/private/users"));
        foreach ($usr_list as $key=>$user) { // [IMPROVE] Stocker l'index de l'utilisateur pour pas avoir a rechercher a chaque fois (mais refaire une verif de l'auth pour checker)
            if ($_SESSION['logged_id'] == $user['id']) {
                $usr_key = $key;
                break;
            }
        }
        if (!isset($usr_key))
            $_SESSION['error_msg'][] = "Utilisateur.rice inconnu.e.\n";
        
        /* Open cart file and add current cart */
        else {
            /* Si il n'y a pas de cart sauvegardé */
            if (!is_file($root."/private/carts")) {
                file_put_contents($root."/private/carts", serialize(array($_SESSION['cart'])));
                $usr_list[$usr_key]['cart'] = 0;
            }
            /* Si il y a deja un cart sauvegarde */
            else {
                $cart_file = fopen($root."/private/carts", "r");
                if (flock($cart_file, LOCK_EX)) {
                    $carts = unserialize(file_get_contents($root."/private/carts"));
                    if (isset($usr_list[$usr_key]['cart']))
                        unset($carts[$user_list[$key]['cart']]);
                    $usr_list[$usr_key]['cart'] = count($carts);
                    $carts[] = $_SESSION['cart'];
                    file_put_contents($root."/private/carts", serialize($carts));
                }
                else {
                    $_SESSION['error_msg'][] = "Impossible de télécharger le panier.\n";
                    print_error();
                }
                flcose($cart_file);
            }
            file_put_contents($root."/private/users", serialize($usr_list));
        }

    }
    else {
        $_SESSION['error_msg'][] = "Impossible d'acceder aux donnees utilisateurs.\n";
        print_error();
    }
    fclose($file);
}

/* Delog */
unset($_SESSION['logged_fname']);
unset($_SESSION['logged_lname']);
unset($_SESSION['logged_id']);
unset($_SESSION['cart']);
header('Location: /Rush0');

?>