<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths;

use \Maths\Maths;
use \Maths\AbstractCartesianObject;
use \Maths\PointInterface;


/**
 * Basic 1D point
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Point1D
    extends AbstractCartesianObject
    implements PointInterface
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        0   => 'getAbscissa',
        'x' => 'getAbscissa',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        0   => 'setAbscissa',
        'x' => 'setAbscissa',
    );

    /**
     * @param   null|mixed    $abscissa
     */
    public function __construct($abscissa = null)
    {
        $this
            ->setSpaceType(Maths::CARTESIAN_1D)
            ->setAbscissa($abscissa);
    }

    /**
     * Write a 1D point as `( x )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa()
        ));
    }

    /**
     * Define the abscissa value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setAbscissa($val)
    {
        $this->_coordinates['abscissa'] = $val;
        return $this;
    }

    /**
     * Get the abscissa value of the point
     *
     * @return  mixed
     */
    public function getAbscissa()
    {
        return $this->_coordinates['abscissa'];
    }

}

// Endfile
