<?php

date_default_timezone_set("Europe/Paris");

$file = fopen("../private/chat", "r");
if (flock($file, LOCK_SH)) {
    $content = unserialize(file_get_contents("../private/chat"));
    foreach ($content as $message) {
            echo date("[i:s] ", $message['time'])."<b>".$message['login']."</b>: ".$message['msg']."<br />\n";
    }
}

?>