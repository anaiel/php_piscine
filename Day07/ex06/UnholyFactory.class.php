<?php

class UnholyFactory {

    private $_absorbed = array ();

    public function absorb ( $victim ) {
        if ( $victim instanceof Fighter ) {
            $str = "(Factory ";
            if ( array_key_exists($victim->getType(), $this->_absorbed) )
                $str = $str."already ";
            else
                $this->_absorbed[$victim->getType()] = $victim;
            $str = $str."absorbed a fighter of type ".$victim->getType().")".PHP_EOL;
            print ($str);
        }
        else
            print ("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
        return;
    }

    public function fabricate ( $requestedFighter ) {
        if ( array_key_exists($requestedFighter, $this->_absorbed) ) {
            print ("(Factory fabricates a fighter of type ".$requestedFighter.")".PHP_EOL);
            return clone $this->_absorbed[$requestedFighter];
        }
        else {
            print ("(Factory hasn't absorbed any fighter of type ".$requestedFighter.")".PHP_EOL);
            return null;
        }
    }

}

?>