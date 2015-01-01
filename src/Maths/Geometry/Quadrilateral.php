<?php
/**
 * This file is part of the Maths package.
 *
 * Copyright (c) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/maths>.
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Geometry\AbstractGeometricObject;
use \Maths\Geometry\Segment;
use \Maths\PointInterface;

/**
 * Class Quadrilateral
 *
 *       D       C
 *       ---------
 *      /       /
 *     ---------
 *     A       B
 *  y
 *  ↑ → x
 *
 */
class Quadrilateral
    extends AbstractGeometricObject
{

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array(
        'a', 'b', 'c', 'd'
    );

    /**
     * @param   null|\Maths\PointInterface    $point_a
     * @param   null|\Maths\PointInterface    $point_b
     * @param   null|\Maths\PointInterface    $point_c
     * @param   null|\Maths\PointInterface    $point_d
     * @param   int                                   $space_type
     */
    public function __construct(
        PointInterface $point_a = null, PointInterface $point_b = null,
        PointInterface $point_c = null, PointInterface $point_d = null,
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
        if (!is_null($point_d)) {
            $this->setPointD($point_d);
        }
    }

    /**
     * Write a line object as `[(Ax,Ay),(Bx,By),(Cx,Cy),(Dx,Dy)]`
     *
     * @return  string
     */
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
            ),
            ($this->is3D() ?
                array($this->getPointD()->x, $this->getPointD()->y, $this->getPointD()->z) : array($this->getPointD()->x, $this->getPointD()->y)
            )
        );
    }

    /**
     * Write an algebraic function of the quadrilateral
     * This will return the "toString" result
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

    /**
     * Define point D of the quadrilateral
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setPointD($point)
    {
        try {
            $this->setPoint('d', $point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the D point of the quadrilateral
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointD()
    {
        return (isset($this->_points['d']) ? $this->_points['d'] : null);
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
     * Get the [C->D] segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentCD()
    {
        try {
            return $this->getSegment('c', 'd');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [D->A] segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentDA()
    {
        try {
            return $this->getSegment('d', 'a');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [A->C] diagonal segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentAC()
    {
        try {
            return $this->getSegment('a', 'c');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [B->D] diagonal segment
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSegmentBD()
    {
        try {
            return $this->getSegment('b', 'd');
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [A->C] diagonal as a Segment with a positive direction(s)
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getFirstDiagonal()
    {
        $a = 'a';
        $c = 'c';
        $directions = Maths::getDirectionByPoints($this->getPointA(), $this->getPointC());
        if ($directions[0]==-1) {
            $a = 'c';
            $c = 'a';
        }
        try {
            return $this->getSegment($a, $c);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * Get the [B->D] diagonal as a Segment with a positive direction(s)
     *
     * @return  Segment
     * @throws  \InvalidArgumentException caught on Segment creation
     */
    public function getSecondDiagonal()
    {
        $b = 'b';
        $d = 'd';
        $directions = Maths::getDirectionByPoints($this->getPointB(), $this->getPointD());
        if ($directions[0]==-1) {
            $b = 'd';
            $d = 'b';
        }
        try {
            return $this->getSegment($b, $d);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

// Utilities

    /**
     * Test if point A is part of one of quadrilateral's segments
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a)
    {
        return (bool) (
            $this->getSegmentAB()->isValidPoint($a) ||
            $this->getSegmentBC()->isValidPoint($a) ||
            $this->getSegmentCD()->isValidPoint($a) ||
            $this->getSegmentDA()->isValidPoint($a)
        );
    }

// Specials

    /**
     * Test if the quadrilateral is a parallelogram
     *
     * @return  bool
     */
    public function isParallelogram()
    {
        $centerdiag1 = $this->getFirstDiagonal();
        $centerdiag2 = $this->getSecondDiagonal();
        return (bool) Maths::areSamePoint($centerdiag1->getCenter(), $centerdiag2->getCenter());
    }

}
