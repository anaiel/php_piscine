<?php

include 'auth.php';
session_start();

if (!auth($_POST['login'], $_POST['passwd'])) {
    $_SESSION['loggued_in_user'] = "";
    echo "KO\n";
    exit ;
}

$_SESSION['loggued_in_user'] = $_POST['passwd'];
?>
<html><body>
    <iframe src='chat.php' name='chat' height='550px' width='100%'></iframe>
    <iframe src='speak.php' name='speak' height='50px' width='100%'></iframe>
</body></html>
