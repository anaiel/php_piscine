<?php

require_once("Matrix.class.php");
require_once("Vertex.class.php");

class Camera {

    public static $verbose = false;

    private $_origin, $_tR, $_tT, $_viewMatrix;
    private $_projMatrix;

    /* Basic methods */

    public function __construct ( array $kwargs ) {
        if (!array_key_exists('origin', $kwargs)
                || !($kwargs['origin'] instanceof Vertex)
                || !array_key_exists('orientation', $kwargs)
                || !($kwargs['orientation'] instanceof Matrix)
                || (array_key_exists('ratio', $kwargs)
                        && (!is_numeric($kwargs['ratio'])
                                || array_key_exists('width', $kwargs)
                                || array_key_exists('height', $kwargs)))
                || (array_key_exists('width', $kwargs)
                        && !is_numeric($kwargs['width']))
                || (array_key_exists('height', $kwargs)
                        && !is_numeric($kwargs['height']))
                || !array_key_exists('fov', $kwargs)
                || !is_numeric($kwargs['fov'])
                || !array_key_exists('near', $kwargs)
                || !is_numeric($kwargs['near'])
                || !array_key_exists('far', $kwargs)
                || !is_numeric($kwargs['far'])) {
            print ("error: invalid construction parameter.".PHP_EOL);
            die ();
        }

        /* Construct view matrix */
        $this->_origin = $kwargs['origin'];
        $v = new Vector ( array( 'dest' => $this->_origin ) );
        $this->_tT = new Matrix ( array( 'preset' => Matrix::TRANSLATION, 'vtc' => $v->opposite() ) );
        $this->_tR = $kwargs['orientation']->transpose();
        $this->_viewMatrix = $this->_tR->mult( $this->_tT );

        /* Construct projection */
        if (!array_key_exists('ratio', $kwargs))
            $kwargs['ratio'] = $kwargs['width'] / $kwargs['height'];
        $this->_projMatrix = new Matrix ( array( 
            'preset'    =>  Matrix::PROJECTION,
            'ratio'     =>  $kwargs['ratio'],
            'fov'       =>  $kwargs['fov'],
            'near'      =>  $kwargs['near'],
            'far'       =>  $kwargs['far'] ) );
        
        if ( self::$verbose === true )
            print ("Camera instance constructed".PHP_EOL);
        return;
    }

    public function __destruct () {
        if ( self::$verbose === true )
            print ("Camera instance destructed".PHP_EOL);
        return;
    }

    public function __toString () {
        $string = "Camera( ".PHP_EOL."+ Origine: ".$this->_origin.PHP_EOL;
        $string = $string."+ tT:".PHP_EOL.$this->_tT.PHP_EOL;
        $string = $string."+ tR:".PHP_EOL.$this->_tR.PHP_EOL;
        $string = $string."+ tR->mult( tT ):".PHP_EOL.$this->_viewMatrix.PHP_EOL;
        $string = $string."+ Proj:".PHP_EOL.$this->_projMatrix.PHP_EOL.")";
        return $string;
    }

    static function doc () {
        return file_get_contents("Camera.doc.txt");
    }

    /* Operation methods */

    public function watchVertex ( Vertex $worldVertex ) {
        $res = $this->_viewMatrix->transformVertex( $worldVertex );
        $res = $this->_projMatrix->transformVertex( $res );
        return $res;
    }

}

?>