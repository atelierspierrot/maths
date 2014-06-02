<?php
/**
 * PHP Library package of Les Ateliers Pierrot
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/library>
 */

namespace Maths;

use \Maths\Maths;
use \Maths\Point1D;
use \Maths\PointInterface;

/**
 * Basic 2D point
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Point2D
    extends Point1D
    implements PointInterface
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        0   => 'getAbscissa',
        'x' => 'getAbscissa',
        1   => 'getOrdinate',
        'y' => 'getOrdinate',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        0   => 'setAbscissa',
        'x' => 'setAbscissa',
        1   => 'setOrdinate',
        'y' => 'setOrdinate',
    );

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     */
    public function __construct($abscissa = null, $ordinate = null)
    {
        parent::__construct($abscissa);
        $this
            ->setSpaceType(Maths::CARTESIAN_2D)
            ->setOrdinate($ordinate);
    }

    /**
     * Write a 2D point as `( x , y )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa(),
            $this->getOrdinate()
        ));
    }

    /**
     * Define the ordinate value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setOrdinate($val)
    {
        $this->_coordinates['ordinate'] = $val;
        return $this;
    }

    /**
     * Get the ordinate value of the point
     *
     * @return  mixed
     */
    public function getOrdinate()
    {
        return $this->_coordinates['ordinate'];
    }

}

// Endfile
