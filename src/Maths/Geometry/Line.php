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
use \Maths\Geometry\AbstractGeometricObject;
use \Maths\PointInterface;

/**
 * Line class : two points A -> B not limited
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Line
    extends AbstractGeometricObject
{

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array(
        'a', 'b'
    );

    /**
     * @param   null|\Maths\PointInterface    $point_a
     * @param   null|\Maths\PointInterface    $point_b
     * @param   int                                   $space_type
     */
    public function __construct(
        PointInterface $point_a = null, PointInterface $point_b = null, $space_type = Maths::CARTESIAN_2D
    ) {
        parent::__construct($space_type);
        if (!is_null($point_a)) {
            $this->setPointA($point_a);
        }
        if (!is_null($point_b)) {
            $this->setPointB($point_b);
        }
    }

    /**
     * Write an algebric function of the line
     *
     * @return  string
     */
    public function __toString()
    {
        return "y = f(x){ ({$this->getSlope()} * x) + {$this->getYIntercept()} }";
    }

// Points

    /**
     * Define point A of the line
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setPointA($point)
    {
        try {
            $this->setPoint('a', $point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the A point of the line
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointA()
    {
        return (isset($this->_points['a']) ? $this->_points['a'] : null);
    }

    /**
     * Define point B of the line
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setPointB($point)
    {
        try {
            $this->setPoint('b', $point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the B point of the line
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointB()
    {
        return (isset($this->_points['b']) ? $this->_points['b'] : null);
    }

// Characteristics

    /**
     * Get the slope of the line: m = (By - Ay) / (Bx - Ax)
     *
     * @return  float
     */
    public function getSlope()
    {
        $r = ($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa());
        return (
            ($this->getPointB()->getOrdinate() - $this->getPointA()->getOrdinate())
            /
            ($r!=0 ? $r : 1)
        );
    }

    /**
     * Get the y-intercept of the line: m = (By - Ay) / (Bx - Ax)
     *
     * @return  float
     */
    public function getYIntercept()
    {
        return ($this->getPointA()->getOrdinate() - ($this->getPointA()->getAbscissa() * $this->getSlope()));
    }

// Specials

    /**
     * Rearrange a segment to have [A->B] in requested direction
     *
     * @param   int     $direction
     * @return  $this
     */
    public function rearrange($direction = Maths::DIRECTION_POSITIVE)
    {
        $a = $this->getPointA();
        $b = $this->getPointB();
        $directions = Maths::getDirectionByPoints($a, $b);
        if ($directions[0]!=$direction) {
            $this->setPointA($b);
            $this->setPointB($a);
        }
        return $this;
    }

// Utilities

    /**
     * Test if a line is vertical (constant X value)
     *
     * @return  bool
     */
    public function isVertical()
    {
        return (bool) ($this->getPointA()->getAbscissa() == $this->getPointB()->getAbscissa());
    }

    /**
     * Test if a line is horizontal (constant Y value)
     *
     * @return  bool
     */
    public function isHorizontal()
    {
        return (bool) ($this->getPointA()->getOrdinate() == $this->getPointB()->getOrdinate());
    }

    /**
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a)
    {
        return (bool) ($a->getOrdinate() == ( ($this->getSlope() * $a->getAbscissa()) + $this->getYIntercept() ));
    }

    /**
     * Get the ordinate of a point of the line by its abscissa
     *
     * @param   float   $x
     * @return  float
     */
    public function getOrdinateByAbscissa($x)
    {
        if ($this->isHorizontal()) {
            return $this->getPointA()->getOrdinate();
        }
        return ( ($this->getSlope() * $x) + $this->getYIntercept() );
    }

    /**
     * Get the abscissa of a point of the line by its ordinate
     *
     * @param   float   $y
     * @return  float
     */
    public function getAbscissaByOrdinate($y)
    {
        if ($this->isVertical()) {
            return $this->getPointA()->getAbscissa();
        }
        return ( ($y - $this->getYIntercept()) / $this->getSlope() );
    }

}

// Endfile
