<?php

require_once("Vertex.class.php");

class Vector {

    public static $verbose = false;

    private $_x, $_y, $_z, $_w = 0;
    
    /* Basic methods */

    public function __construct ( array $kwargs ) {

        if ( !array_key_exists('dest', $kwargs)
                || !($kwargs['dest'] instanceof Vertex)
                || (array_key_exists('orig', $kwargs)
                && !($kwargs['orig'] instanceof Vertex))) {
            print ("error: invalid contruction parameter.".PHP_EOL);
            die ();
        }

        if ( !array_key_exists('orig', $kwargs) )
            $kwargs['orig'] = new Vertex (
                array ('x' => 0, 'y' => 0, 'z' => 0)
            );
        
        $this->_x = $kwargs['dest']->getX() / $kwargs['dest']->getW()
                - $kwargs['orig']->getX() / $kwargs['orig']->getW();
        $this->_y = $kwargs['dest']->getY() / $kwargs['dest']->getW()
                - $kwargs['orig']->getY() / $kwargs['orig']->getW();
        $this->_z = $kwargs['dest']->getZ() / $kwargs['dest']->getW()
                - $kwargs['orig']->getZ() / $kwargs['orig']->getW();

        if (self::$verbose === true)
            print ($this." constructed".PHP_EOL);
        
    }

    public function __destruct () {
        if (self::$verbose === true)
            print ($this." destructed".PHP_EOL);
    }

    public function __toString () {
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
                $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public static function doc () {
        return file_get_contents("Vector.doc.txt");
    }

    public function __clone () {
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_x,
                    'y' => $this->_y,
                    'z' => $this->_z
                )
            ) )
        );
    }

    /* Accessors */

    public function getX () { return $this->_x; }

    public function getY () { return $this->_y; }

    public function getZ () { return $this->_z; }

    public function getW () { return $this->_w; }

    /* Operation methods */

    public function magnitude () {
        return sqrt(
            pow($this->_x, 2)
            + pow($this->_y, 2)
            + pow($this->_z, 2)
        );
    }

    public function normalize () {
        $mag = $this->magnitude();
        if ( $mag == 1 )
            return clone $this;
        return new Vector (
            array( 'dest' => new Vertex ( 
                array( 
                    'x' => $this->_x / $mag,
                    'y' => $this->_y / $mag,
                    'z' => $this->_z / $mag
                )
            ) )
        );
    }

    public function add ( Vector $rhs ) {
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_x + $rhs->getX(),
                    'y' => $this->_y + $rhs->getY(),
                    'z' => $this->_z + $rhs->getZ()
                )
            ) )
        );
    }

    public function sub ( Vector $rhs ) {
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_x - $rhs->getX(),
                    'y' => $this->_y - $rhs->getY(),
                    'z' => $this->_z - $rhs->getZ()
                )
            ) )
        );
    }

    public function opposite () {
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_x * -1,
                    'y' => $this->_y * -1,
                    'z' => $this->_z * -1
                )
            ) )
        );
    }

    public function scalarProduct ( $k ) {
        if (!is_numeric($k)) {
            print ("error: invalid parameter '".$k."' in scalarProduct method.".PHP_EOL);
            die ();
        }
        
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_x * $k,
                    'y' => $this->_y * $k,
                    'z' => $this->_z * $k
                )
            ) )
        );
    }

    public function dotProduct ( Vector $rhs ) {
        return $this->_x * $rhs->getX() + $this->_y * $rhs->getY()
                + $this->_z * $rhs->getZ();
    }

    public function cos ( Vector $rhs ) {
        return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
    }

    public function crossProduct ( Vector $rhs ) {
        return new Vector (
            array( 'dest' => new Vertex (
                array(
                    'x' => $this->_y * $rhs->getZ() - $rhs->getY() * $this->_z,
                    'y' => $this->_z * $rhs->getX() - $rhs->getZ() * $this->_x,
                    'z' => $this->_x * $rhs->getY() - $rhs->getX() * $this->_y
                )
            ) )
        );
    }

}

?>