<?php

trait Dice {

    static $short_range = 4, $medium_range = 5, $long_range = 6;

    public function diceThrow ( $nbDice, $minVal ) {
        if (!is_numeric($nbDice)
                || !is_numeric($minVal)) {
            // [TO DO] Meilleur gestion d'erreur
            echo "error: wrong argument for dice throw\n";
            die();
        }

        $nbSuccess = 0;
        for ( $i = 0; $i < $nbDice; $i++ ) {
            if ( rand(1, 6) >= $minVal )
                $nbSuccess++;
        }

        return $nbSuccess;
    }

}

?>