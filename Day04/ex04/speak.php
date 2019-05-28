<?php

session_start();

if ($_POST['msg'] != "") {
    $new_msg = array('msg' => $_POST['msg'], 'time' => time(), 'login' => $_SESSION['loggued_in_user']);
    if (!file_exists("../private/chat"))
    {
        $content = array($new_msg);
        file_put_contents("../private/chat", serialize($content));
    }
    else {
        $file = fopen("../private/chat", "r+");
        if (flock($file, LOCK_EX)) {
            $content = unserialize(file_get_contents("../private/chat"));
            $content[] = $new_msg;
            file_put_contents("../private/chat", serialize($content));
        }
        fclose($file);
    }
}

if ($_SESSION['loggued_in_user'] == "") {
    echo "ERROR\n";
    exit ;
}

?>
<html><head><script langage='javascript'>top.frames['chat'].location = 'chat.php';</script></head><body>
    <form method='post' action='speak.php'>
        <input type='text' name='msg' value=''/>
</form>
</body></header>
