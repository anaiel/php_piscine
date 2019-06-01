<?php

abstract class Fighter {

    private $_type;

    public function __construct ( $type ) {
        if ( !is_string($type) ) {
            print ("error: invalid construction parameter of Fighter class instance".PHP_EOL);
            die ();
        }
        $this->_type = $type;
    }

    public function getType () { return $this->_type; }

    abstract function fight ( $target ) ;

}

?>