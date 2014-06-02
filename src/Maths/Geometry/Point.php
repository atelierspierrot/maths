<?php
/**
 * PHP Library package of Les Ateliers Pierrot
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/library>
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Point3D;
use \Maths\PointInterface;

/**
 * Point class
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Point
    extends Point3D
    implements PointInterface
{

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     * @param   null|mixed    $applicate
     */
    public function __construct($abscissa = null, $ordinate = null, $applicate = null)
    {
        parent::__construct($abscissa, $ordinate, $applicate);
        $args = func_get_args();
        $this->setSpaceType(count($args)==3 ? \Maths\Maths::CARTESIAN_3D : (
            count($args)==2 ? \Maths\Maths::CARTESIAN_2D : \Maths\Maths::CARTESIAN_1D
        ));
    }

    /**
     * Write a 3D point as `( x , y , z )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(
            $this->is3D() ? array($this->getAbscissa(),$this->getOrdinate(),$this->getApplicate()) : (
                $this->is2D() ? array($this->getAbscissa(),$this->getOrdinate()) : array($this->getAbscissa())
            )
        );
    }

}

// Endfile
