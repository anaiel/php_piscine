<?php

interface Weapon {

    function shoot ( array $coords );
    function inRange ( array $coords );
    function __invoke ( array $coords );

}

?>