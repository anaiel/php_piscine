<?php 

session_start();

?>
<div id='header'>
    <h1><a title='YAUQ' href='/Rush0'>Yauq</a></h1>
    <div id='connexion'>
        <?php
            if (isset($_SESSION['logged_id'])) {
                echo "<p>Bonjour, <a href='/Rush0/perso/main.php'>".$_SESSION['logged_fname']."</a>!</p>";
                echo "<a href='/Rush0/users/logout.php' name='logout'>Log out</a>";
            }
            else {
                echo "<div id='login'>";
                echo "<form method='post' action='/Rush0/users/login.php'><table><tr><td>Email</td><td>";
                echo "<input type='text' name='email' value='' /></td>";
                echo "</tr><tr><td>Mot de passe</td><td><input type= 'password' name='passwd' value='' /></td></tr>";
                echo "</table><input type='submit' name='submit' value='OK' /></form>";
                echo "<a href='/Rush0/users/create.php'><button>Créer un compte</button></a>";
                echo "</div>";
            }
        ?>
    </div>
    <div id='cart'>
        <img title='cart_img' alt='cart' src='/Rush0/images/cart.png' />
        <?php
            if (isset($_SESSION['cart'])) {
                $nb_items = 0;
                foreach ($_SESSION['cart'] as $qt)
                    $nb_items += $qt;
                echo "<div id='nb_items'>".$nb_items."</div>";
                echo "<a href='/Rush0/cart.php'>Valider ma commande</a>";
                echo "<br />";
                echo "<a href='/Rush0/empty_cart.php'>Vider le panier</a>";
            }
        ?> 
    </div>
</div>