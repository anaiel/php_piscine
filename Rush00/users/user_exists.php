<?php

function user_exists ($email) {
    $root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
    $file = fopen($root."/private/users", "r");
    if (flock($file, LOCK_SH)) {
        $usr_list = unserialize(file_get_contents($root."/private/users"));
        foreach ($usr_list as $user) {
            if ($user['email'] == $email) {
                return true;
            }
        }
    }
    fclose($file);
    return false;
}

?>