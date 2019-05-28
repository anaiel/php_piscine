<?php

function display_item ($item) {
    echo "<div class='item'>";
    echo "<img title='".$item['1']."' alt='".$item['1']."' src='/Rush0/images/catalog/".$item['3']."' />";
    echo "<div class='item_info'>";
    echo "<p>".$item['1']."</p>";
    echo "<p>".$item['4']."€</p>";
    echo "<div class='description'>";
    echo $item[2];
    echo "<button name='buy' type='submit' value='".$item[0]."'>Ajouter au panier</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

?>