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
use \Maths\Geometry\AbstractGeometricObject;
use \Maths\Geometry\Segment;
use \Maths\PointInterface;

/**
 * Class Triangle
 *
 * - 'alpha' angle is [cAb]
 * - 'beta' angle is [aCb]
 * - 'gamma' angle is [aBc]
 *
 *          C
 *         / \
 *        /   \
 *       /     \
 *      --------
 *     A        B
 *  y
 *  ↑ → x
 *
 */
class Triangle
    extends AbstractGeometricObject
{

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array(
        'a', 'b', 'c'
    );

    /**
     * @param   null|\Maths\PointInterface    $point_a
     * @param   null|\Maths\PointInterface    $point_b
     * @param   null|\Maths\PointInterface    $point_c
     * @param   int                                   $space_type
     */
    public function __construct(
        PointInterface $point_a = null, PointInterface $point_b = null, PointInterface $point_c = null,
        $space_type = Maths::CARTESIAN_2D
    ) {
        parent::__construct($space_type);
        if (!is_null($point_a)) {
            $this->setPointA($point_a);
        }
        if (!is_null($point_b)) {
            $this->setPointB($point_b);
        }
        if (!is_null($point_c)) {
            $this->setPointC($point_c);
        }
    }

    public function __toString()
    {
        return Maths::polygonToString(
            ($this->is3D() ?
                array($this->getPointA()->x, $this->getPointA()->y, $this->getPointA()->z) : array($this->getPointA()->x, $this->getPointA()->y)
            ),
            ($this->is3D() ?
                array($this->getPointB()->x, $this->getPointB()->y, $this->getPointB()->z) : array($this->getPointB()->x, $this->getPointB()->y)
            ),
            ($this->is3D() ?
                array($this->getPointC()->x, $this->getPointC()->y, $this->getPointC()->z) : array($this->getPointC()->x, $this->getPointC()->y)
            )
        );
    }

    /**
     * Write an algebraic function of the line
     *
     * @return  string
     */
    public function __equationToString()
    {
        return $this->__toString();
    }

// Points

    /**
     * Define point A of the quadrilateral
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
     * Get the A point of the quadrilateral
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointA()
    {
        return (isset($this->_points['a']) ? $this->_points['a'] : null);
    }

    /**
     * Define point B of the quadrilateral
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
     * Get the B point of the quadrilateral
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointB()
    {
        return (isset($this->_points['b']) ? $this->_points['b'] : null);
    }

    /**
     * Define point C of the quadrilateral
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setPointC($point)
    {
        try {
            $this->setPoint('c', $point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the C point of the quadrilateral
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointC()
    {
        return (isset($this->_points['c']) ? $this->_points['c'] : null);
    }

// Segments

    /**
     * Get the [A->B] segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentAB()
    {
        try {
            return $this->getSegment('a', 'b');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [B->C] segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentBC()
    {
        try {
            return $this->getSegment('b', 'c');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [C->A] segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentCA()
    {
        try {
            return $this->getSegment('c', 'a');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

// Characteristics

    /**
     * @return  float
     */
    public function getPerimeter()
    {
        return ($this->getSegmentAB()->getLength() + $this->getSegmentBC()->getLength() + $this->getSegmentCA()->getLength());
    }

    /**
     * @return  float
     */
    public function getArea()
    {
        $p = $this->getPerimeter() / 2;
        return sqrt(
            $p *
            ($p - $this->getSegmentAB()->getLength()) *
            ($p - $this->getSegmentBC()->getLength()) *
            ($p - $this->getSegmentCA()->getLength())
        );
    }

// Utilities

    /**
     * Test if point A is in one of the triangle's segments
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a)
    {
        return (bool) (
            $this->getSegmentAB()->isValidPoint($a) ||
            $this->getSegmentBC()->isValidPoint($a) ||
            $this->getSegmentCA()->isValidPoint($a)
        );
    }

    /**
     * Test if a triangle is equilateral : [AB] = [BC] = [CA]
     *
     * @return  bool
     */
    public function isEquilateral()
    {
        return (bool) (
            ($this->getSegmentAB()->getLength() == $this->getSegmentBC()->getLength()) &&
            ($this->getSegmentAB()->getLength() == $this->getSegmentCA()->getLength())
        );
    }

    /**
     * Test if a triangle is equilateral : [AB] = [BC] OR [AB] = [CA] OR [BC] = [CA]
     *
     * @return  bool
     */
    public function isIsoceles()
    {
        return (bool) (
            $this->isEquilateral()==false && (
                ($this->getSegmentAB()->getLength() == $this->getSegmentBC()->getLength()) ||
                ($this->getSegmentAB()->getLength() == $this->getSegmentCA()->getLength()) ||
                ($this->getSegmentBC()->getLength() == $this->getSegmentCA()->getLength())
            )
        );
    }

}
