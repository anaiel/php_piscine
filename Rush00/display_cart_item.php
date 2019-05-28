<?php

function display_cart_item ($item, $qt) {
    echo "<div class='item'>";
    echo "<img title='".$item['1']."' alt='".$item['1']."' src='/Rush0/images/catalog/".$item['3']."' />";
    echo "<div class='item_info'>";
    echo "<p>".$item['1']."</p>";
    $total = $item[4] * $qt;
    echo "<p>".$total."€</p>";
    echo "</div>";
    echo "</div>";
}

?>