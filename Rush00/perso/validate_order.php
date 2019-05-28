<?php

start_session();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";

if ($_POST['submit'] == 'Valider la commande') {
    /* Supprimer la commande des paniers en cours */
    $file = fopen($root."/private/carts");
    if (flock($file, LOCK_EX)) {
        
    }
    /* Ajouter la commande aux commandes validées */
}

header('Location: /Rush0/perso/main.php');
exit;

?>