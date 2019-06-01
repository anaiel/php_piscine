<?php

trait Direction {

    public function changeDirection ( $direction ) {
        if ( !in_array($direction, array('up', 'down', 'left', 'right')) ) {
            // [IMPROVE] Gestion d'erreur
            echo "error: cannot move that way\n";
            die();
        }

        $position = array();
        if ( $direction == 'right' || $direction == 'left'  ) {
            $j_mod = 1;
            if ( $direction == 'right' )
                $j_mod = -1;
            for ( $i = 0; $i < static::$_width; $i++ ) {
                for ( $j = 0; $j < static::$_length; $j++ ) {
                    if ( $i != 0 || $j != 0 )
                        $position[] = array( 'x' => $i, 'y' => $j * $j_mod );
                }
            }
        }
        else {
            $i_mod = 1;
            if ( $direction == 'down' )
                $i_mod = -1;
            for ( $i = 0; $i < static::$_length; $i++ ) {
                for ( $j = 0; $j < static::$_width; $j++ ) {
                    if ( $i != 0 || $j != 0 )
                        $position[] = array( 'x' => $i * $i_mod, 'y' => $j );
                }
            }
        }

        return $position;
    }

}

?>