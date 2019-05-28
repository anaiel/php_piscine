<!-- [TO DO] Changer le mot de passe -->
<!-- [TO DO] Changer l'adresse mail -->
<!-- [TO DO] Voir sa commande -->


<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/my_hash.php';
include $root.'/print_error.php';
include $root.'/print_success.php';

if (
   // (
        (isset($_POST['fname']) && isset($_POST['nfname']))
        /*|| (isset($_POST['lname']) && isset($_POST['nlname']))
        || (isset($_POST['oldpw']) && isset($_POST['newpw1']) && isset($_POST['newpw2']))
        || isset($_POST['new_id'])
    )
    && isset($_POST['id'])
    && $_POST['submit'] == "OK"
    && file_exists($root."/private/users")*/
    )
{
    $data = unserialize(file_get_contents($root."/private/users"));
    $i = 0;
    echo "\n\n\n\n OUUUUUUUUUUUUUII\n";
    
    $hash = my_hash($_POST['olpwd']);
    $hash1 = my_hash($_POST['newpwd1']);
    $hash2 = my_hash($_POST['newpwd2']);
    $hash_id = my_hash($_POST['id']);
    $hash_new_id = my_hash($_POST['new_id']);
    while ($data[$i])
    {
        $account = $data[$i];
        if ($account["passwd"] == $hash && $hash_id == $account['id'])
        {   
            if($hash1 != $hash2 || $hash1 == $account["passwd"])
            {
                if ($hash1 != $hash_2)
                    $_SESSION['error_msg'][] = "Les champs 'Nouveau mot de passe' sont différents";
                else if ($hash1 == $account["passwd"])
                    $_SESSION['error_msg'][] = "Le nouveau mot de passe est le même que l'ancien";
            }
            else
            {
                $data[$i]["passwd"] = $hash1;
                $_SESSION['succcess_msg'][] = "Votre mot de passe modifié";
            }
        }
        if ($account["fname"] == $_POST['fname'] && $hash_id == $account['id'])
        {
            $data[$i]["fname"] = $_POST["nfname"];
            $_SESSION['success_msg'][] = "Votre prénom a été modifié";
        }
        if ($account["lname"] == $_POST['lname'] && $hash_id == $account['id'])
        {
            $data[$i]["lname"] = $_POST["nlname"];
            $_SESSION['success_msg'][] = "Votre nom a été modifié";
        }
        if ($hash_id == $account['id'] && $hash_id == $account['id'])
        {
            $data[$i]["id"] = $hash_id;
            $_SESSION['success_msg'][] = "Votre prénom a été modifié";
        }
        if ($_SESSION['id'] == $account['id'])
            break;
        $i++;
    }
    file_put_contents($root."/private/users", serialize($data));
}
else
    $_SESSION['error_msg'][] = "Vous n'avez rien modifié";

?>


<html>


<head>
    <title>Modification compte</title>
    <link rel='stylesheet' type='text/css' href='/Rush0/style.css' />
</head>
<body>

<?php print_error(); ?>
<?php print_success(); ?>

<form action="/Rush0/perso/modif.php" method="post">
email actuel: <input type="text" name="id" />
  <br />
  <br />
  Nouvel email: <input type="text" name="new_id" />
  <br />
  Prénom actuel: <input type="text" name="fname" />
  <br />
  Nouveau prénom: <input type="text" name="nfname" />
  <br />
  Nom actuel: <input type="text" name="lname" />
  <br />
  Nouveau nom: <input type="text" name="nlname" />
  <br />
  Mot de passe actuel: <input type="password" name="oldpw" />
  <br />
  Nouveau mot de passe : <input type="password" name="newpw1" />
  <br />
  Nouveau mot de passe: <input type="password" name="newpw2"/>
  <br />
<input type="submit" name="submit" value="OK"/>
</form>

</body>
</html>