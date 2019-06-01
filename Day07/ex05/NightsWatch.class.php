<?php

include_once("IFighter.class.php");

class NightsWatch implements IFighter {

    static $members;

    public function recruit ( $freshMeat ) {
        self::$members[] = $freshMeat;
        return;
    }

    public function fight () {
        foreach ( self::$members as $crow ) {
            if ( $crow instanceof IFighter )
                $crow->fight();
        }
        return;
    }

}

?>