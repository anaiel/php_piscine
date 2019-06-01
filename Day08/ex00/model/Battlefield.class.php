<?php

class Battlefield {

    public static $verbose = false;

    const WIDTH = 150, HEIGHT = 100;

    public  $battlefield;
    private $_players;
    public  $_playerTurn = 0;

    /* Basic methods */

    public function __construct () {
        $this->battlefield = array();
        for ( $i = 0; $i < self::HEIGHT; $i++ ) {
            $this->battlefield[$i] = array();
            for ( $j = 0; $j < self::WIDTH; $j++ ) {
                $this->battlefield[$i][$j] = null;
            }
        }

        if ( self::$verbose === true )
            print("Battlefield generated".PHP_EOL); // [TO DO] Meilleur message de début
    }

    public function __destruct () {
        if ( self::$verbose === true )
            print("Battlefield destroyed".PHP_EOL); // [TO DO] Meilleur message de fin
        return;
    }

    static function doc () {
        return file_get_contents('Battlefield.doc.txt');
    }

    /* Accessors */

    public function getPlayerTurn () { return $this->_playerTurn; }

    public function getPlayer ( $status ) {
        if ( !in_array($status, array ('active', 'inactive')) ) {
            /* [IMPROVE] Gestion d'erreur */
            echo "error: erroneous status";
            die();
        }
        switch ( $status ) {
            case 'active':
                return $this->_players[$this->_playerTurn];
                break;
            case 'inactive':
                return $this->_players[($this->_playerTurn + 1) % 2];
                break;
        }
    }

    /* Methods */

    public function display () {
        $display = "<table>";
        for ( $i = 0; $i < self::HEIGHT; $i++ ) {
            $display = $display."<tr>";
            for ( $j = 0; $j < self::WIDTH; $j++ ){
                switch ( $this->battlefield[$i][$j] ){
                    case null:
                        $display = $display."<td class='noonehere' title='x = ".$i."; y = ".$j."'></td>";
                        break;
                    case $this->battlefield[$i][$j] instanceof Ship:
                        $display = $display."<td class='someonehere' title='x = ".$i."; y = ".$j."'></td>";
                        break;
                }
            }
            $display = $display."</tr>";
        }
        $display = $display."</table>";
        return $display;
    }

    public function newPlayer ( Player $newPlayer ) {
        if ( count($this->_players) == 2 ) {
            /* [IMPROVE] Gestion d'erreur */
            echo "Too many players\n";
            die ();
        }

        $this->_players[] = $newPlayer;

        return;
    }

    public function nextPlayer () {
        $this->_playerTurn = ($this->_playerTurn + 1) % 2;
        return;
    }

}

?>