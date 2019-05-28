<?php

function print_success () {
    foreach($_SESSION['success_msg'] as $success)
        echo "<div class='success'>".$success."</div>";
    unset($_SESSION['success_msg']);
}

?>