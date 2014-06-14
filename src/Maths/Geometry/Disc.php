<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/maths>
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Geometry\Circle;
use \Maths\PointInterface;

/**
 * Class Disc
 *
 */
class Disc
    extends Circle
{

    /**
     * @return  string
     */
    public function __toString()
    {
        return '[disc O'
            .Maths::coordinatesToString(array($this->getPointO()->getAbscissa(), $this->getPointO()->getOrdinate()))
            .',r='.$this->getRadius().']';
    }

// Characteristics

    /**
     * @return  float
     */
    public function getArea()
    {
        return (pi() * ($this->getRadius() * $this->getRadius()));
    }

// Utilities

    /**
     * Test if a point is on the external circle of the disc
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidCirclePoint(PointInterface $a)
    {
        return (bool) parent::isValidPoint($a);
    }

    /**
     * Test if a point is part of the disc ([O->a] <= r)
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a)
    {
        $s = new Segment($this->getPointO(), $a);
        return (bool) ($s->getLength() <= $this->getRadius());
    }

}
