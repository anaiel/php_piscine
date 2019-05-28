<?php

function print_error () {
    foreach($_SESSION['error_msg'] as $error)
        echo "<div class='error'>".$error."</div>";
    unset($_SESSION['error_msg']);
}

?>