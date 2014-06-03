<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Geometry\Line;
use \Maths\PointInterface;

/**
 * Segment class : two points A -> B
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Segment
    extends Line
{

    /**
     * Write a 3D point as `( x , y , z )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::segmentToString(
            ($this->is3D() ?
                array($this->getPointA()->x, $this->getPointA()->y, $this->getPointA()->z) : array($this->getPointA()->x, $this->getPointA()->y)
            ),
            ($this->is3D() ?
                array($this->getPointB()->x, $this->getPointB()->y, $this->getPointB()->z) : array($this->getPointB()->x, $this->getPointB()->y)
            )
        );
    }

    /**
     * Write an algebric function of the line
     *
     * @return  string
     */
    public function __equationToString()
    {
        return "y = f(x){ ({$this->getSlope()} * x) + {$this->getYIntercept()} }";
    }

// Characteristics

    /**
     * Get the length of the segment
     *
     * @return  float
     */
    public function getLength()
    {
        return sqrt(
            pow(($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa()), 2)
            +
            pow(($this->getPointB()->getOrdinate() - $this->getPointA()->getOrdinate()), 2)
        );
    }

    /**
     * Get the middle of the segment as a `\Maths\Geometry\Point` object
     *
     * @return  \Maths\Geometry\Point
     */
    public function getCenter()
    {
        $abscissas = array(
            $this->getPointA()->getAbscissa(), $this->getPointB()->getAbscissa()
        );
        $ordinates = array(
            $this->getPointA()->getOrdinate(), $this->getPointB()->getOrdinate()
        );
        return new Point(
            ((max($abscissas) - min($abscissas)) / 2),
            ((max($ordinates) - min($ordinates)) / 2)
        );
    }

}

// Endfile
