<?php 

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";

?>
<div id='footer'>
    <ul>
        <a href='#'><li>A propos</li></a>
        <a href='#'><li>Rejoindre l'equipe</li></a>
    </li>
    <?php
        $file = fopen($root."/private/users", "r");
        if (flock($file, LOCK_SH)) {
            $usr_list = unserialize(file_get_contents($root."/private/users"));
            foreach ($usr_list as $user) {
                if ($_SESSION['logged_id'] == $user['id']) {
                    if ($user['admin'] === true) {
                        echo "<a href='/Rush0/admin/admin.php'><div id='admin_link'>Panneau d'administration</div></a>";
                    }
                    else
                        break ;
                }
            }
        }
        fclose($file);
    ?>
</div>