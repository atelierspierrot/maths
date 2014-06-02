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
use \Maths\Geometry\Quadrilateral;
use \Maths\Geometry\Segment;

/**
 * Class Rectangle
 *
 *      D       C
 *      ---------
 *      |       |
 *      ---------
 *      A       B
 *  y
 *  ↑ → x
 *
 */
class Rectangle
    extends Quadrilateral
{

    /**
     * @param   null|\Maths\Point(s)    $point_a
     * @param   null|\Maths\Point(s)    $point_b
     * @param   null|\Maths\Point(s)    $point_c
     * @param   null|\Maths\Point(s)    $point_d
     * @param   int                             $space_type
     */
    public function __construct(
        $point_a = null, $point_b = null, $point_c = null, $point_d = null,
        $space_type = Maths::CARTESIAN_2D
    ) {
        parent::__construct(
            $point_a, $point_b, $point_c, $point_d, $space_type
        );
    }

// Characteristics

    /**
     * Get rectangle's width (by convention width > height)
     *
     * @return  numeric
     */
    public function getWidth()
    {
        return max(array(
            ($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa()),
            ($this->getPointD()->getOrdinate() - $this->getPointA()->getOrdinate())
        ));
    }

    /**
     * Get rectangle's height (by convention width > height)
     *
     * @return  numeric
     */
    public function getHeight()
    {
        return min(array(
            ($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa()),
            ($this->getPointD()->getOrdinate() - $this->getPointA()->getOrdinate())
        ));
    }

    /**
     * @return  numeric
     */
    public function getArea()
    {
        return ($this->getWidth() * $this->getHeight());
    }

    /**
     * @return  numeric
     */
    public function getPerimeter()
    {
        return ($this->getWidth() + $this->getHeight()) * 2;
    }
    
// Specials

    /**
     * @param   array   ( Ax , Ay , Cx, Cy )
     */
    public function createFromCoordinates(array $coords)
    {
        return $this
            ->setA(array( 'x'=>$coords[0], 'y'=>$coords[1] ))
            ->setB(array( 'x'=>$coords[2], 'y'=>$coords[1] ))
            ->setC(array( 'x'=>$coords[0], 'y'=>$coords[3] ))
            ->setD(array( 'x'=>$coords[2], 'y'=>$coords[3] ))
            ;
    }

}
