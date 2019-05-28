<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/my_hash.php';

function auth ($email, $passwd) {
    global $root;
    $file = fopen($root."/private/users", "r");
    if (flock($file, LOCK_SH)) {
        $usr_list = unserialize(file_get_contents($root."/private/users"));
        $passwd = my_hash($passwd);
        foreach ($usr_list as $user) {
            if ($email == $user['email'] && $passwd == $user['passwd']) {
                return true;
            }
        }
    }
    return false;
}

?>