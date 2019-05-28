<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";

$success = false;
$file = fopen($root."/catalog.csv", "r");
// [TO DO] Cas ou le fichier n'existe pas
if ($_POST['submit'] == "OK" && flock($file, LOCK_EX)) {

    /* Check conformity */
    $ok = true;
    if (!preg_match('/^[0-9]{4}$/', $_POST['ref'])) {
        $ok = false;
        $_SESSION['error_msg'][] = 'La référence doit être composée de 4 chiffres.\n';
    }
    fgetcsv($file, 0, ';');
    while (!feof($file)) {
        $item = fgetcsv($file, 0, ';');
        if ($_POST['ref'] == $item[0]) {
            $ok = false;
            $_SESSION['error_msg'][] = 'La référence existe déjà.\n';
            break ;
        }
    }
    if (strlen($_POST['name']) > 40) {
        $ok = false;
        $_SESSION['error_msg'][] = 'Le nom ne peut pas comporter plus de 40 caractères.\n';
    }
    if (strlen($_POST['description']) > 500) {
        $ok = false;
        $_SESSION['error_msg'][] = 'La description ne peut pas comporter plus de 500 caractères.\n';
    }
    // [TO DO] Verifier l'extension de l'image
    // [TO DO] Verifier les categories (et dans ce cas, offrir la possibilité de créer une catégorie)

    /* Add item to the csv file */
    if ($ok === true) {
        fputcsv($file, array($_POST['ref'], $_POST['name'], $_POST['description'], $_POST['image'], $_POST['price'], $_POST['color'], $_POST['categories']), ';');
        $success = true;
    }

}
else
    $_SESSION['error_msg'][] = "Impossible d'ouvrir le catalogue.\n";
fclose($file);
if ($success === true)
    $_SESSION['success_msg'][] = "Objet ajouté au catalogue.\n"; // [TO DO] Fonction d'affichage du succes.
header('Location: /Rush0/admin/admin.php');
exit ;

?>