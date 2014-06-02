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
use \Maths\Point2D;
use \Maths\PointInterface;

/**
 * Basic 3D point
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Point3D
    extends Point2D
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
        2   => 'getApplicate',
        'z' => 'getApplicate',
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
        2   => 'setApplicate',
        'z' => 'setApplicate',
    );

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     * @param   null|mixed    $applicate
     */
    public function __construct($abscissa = null, $ordinate = null, $applicate = null)
    {
        parent::__construct($abscissa, $ordinate);
        $this
            ->setSpaceType(Maths::CARTESIAN_3D)
            ->setApplicate($applicate);
    }

    /**
     * Write a 3D point as `( x , y , z )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa(),
            $this->getOrdinate(),
            $this->getApplicate()
        ));
    }

    /**
     * Define the applicate value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setApplicate($val)
    {
        $this->_coordinates['applicate'] = $val;
        return $this;
    }

    /**
     * Get the applicate value of the point
     *
     * @return  mixed
     */
    public function getApplicate()
    {
        return $this->_coordinates['applicate'];
    }

}

// Endfile
