<?php

class NavalSpear implements Weapon {

    const CHARGES = 1; // [TO DO] Gestion des Charges en fonction des ordres
    const SRANGE = 30;
    const MRANGE = 60;
    const LRANGE = 90;

    use Dice;

    private $_ship;
    private static $_name = 'Naval Spear';

    /* Basic methods */

    public function __construct ( array $kwargs ) {
        if ( !array_key_exists('ship', $kwargs)
                || !($kwargs['ship'] instanceof Ship)) {
            // [IMPROVE] Gestion d'erreur
            echo "error: incorrect construction parameter for NavalSpear class.\n";
            die();
        }

        $this->_ship = $kwargs['ship'];

        return;
    }

    public static function doc () {
        return file_get_contents("NavalSpear.doc.php");
    }

    public function __invoke ( array $coords ) {
        $this->shoot($coords);
        return;
    }

    /* Accessors */

    public function getName() {
        return self::$_name;
    }

    /* Methods */

    public function shoot ( array $coords ) {
        if (!array_key_exists('x', $coords)
                || !is_numeric($coords['x'])
                || !array_key_exists('y', $coords)
                || !is_numeric($coords['y'])) {
            /* [IMPROVE] Message d'erreur */
            echo "error: wrong coordinates in shoot method.\n";
            die();
        }

        /* Calculates the number of damage */
        $range = $this->inRange($coords);
        switch ( $range ){
            case self::SRANGE:
                $damage = $this->diceThrow(self::CHARGES, Dice::$short_range);
                break;
            case self::MRANGE:
                $damage = $this->diceThrow(self::CHARGES, Dice::$medium_range);
                break;
            case self::LRANGE:
                $damage = $this->diceThrow(self::CHARGES, Dice::$long_range);
                break;
        }

        /* Inflict damage */
        $target = $this->_ship->bttlfld->battlefield[$coords['x']][$coords['y']];
        if ($target != null)
            $target->takeHit($damage);

        return ;
    }

    public function inRange ( array $coords ) {
        /* [TO DO] Faire une vraie fonction */
        return self::SRANGE;
    }

}

?>