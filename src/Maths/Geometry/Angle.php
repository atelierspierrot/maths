<?php
/**
 * This file is part of the Maths package.
 *
 * Copyright (c) 2014-2016 Pierre Cassat <me@e-piwi.fr> and contributors
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
 * Class Angle
 *
 *        B
 *       /
 *      / ) alpha
 *     ---------
 *     A        C
 *  y
 *  ↑ → x
 *
 * @author  piwi <me@e-piwi.fr>
 */
class Angle
    extends AbstractGeometricObject
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * "i" may be lowercase only
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        'alpha'=>'getAngle',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * "i" may be lowercase only
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        'alpha'=>'setAngle',
    );

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array(
        'a', 'b', 'c'
    );

    /**
     * @var int The angle value
     */
    protected $angle;

    /**
     * @param   null|\Maths\PointInterface    $point_a
     * @param   null|\Maths\PointInterface    $point_b
     * @param   null|\Maths\PointInterface    $point_c
     * @param   int                           $angle
     * @param   int                           $space_type
     */
    public function __construct(
        PointInterface $point_a = null, PointInterface $point_b = null,
        PointInterface $point_c = null, $angle = null,
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
        if (!is_null($angle)) {
            $this->setAngle($angle);
        }
    }

    /**
     * Write an angle object as `[alpha=..]`
     *
     * @return  string
     */
    public function __toString()
    {
        return '[alpha='.$this->getAngle().']';
    }

    /**
     * Write an algebraic function of the angle
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
     * Define the angle value (in degrees)
     *
     * @param   int    $val
     * @return  $this
     */
    public function setAngle($val)
    {
        $this->angle = $val;
        return $this;
    }

    /**
     * Get the angle value (in degrees by default)
     *
     * @return  int|null
     */
    public function getAngle()
    {
        return $this->angle;
    }

// Characteristics

    /**
     * Define the angle value in degrees
     *
     * @param   int    $val
     * @return  $this
     */
    public function setAngleByDeg($val)
    {
        return $this->setAngle($val);
    }

    /**
     * Define the angle value in radians
     *
     * @param   int    $val
     * @return  $this
     */
    public function setAngleByRad($val)
    {
        return $this->setAngle(rad2deg($val));
    }

    /**
     * Get the angle value in degrees (default)
     *
     * @return  int|null
     */
    public function getAngleToDeg()
    {
        return $this->getAngle();
    }

    /**
     * Get the angle value in radians
     *
     * @return  int|null
     */
    public function getAngleToRad()
    {
        return deg2rad($this->getAngle());
    }

// Specials

    /**
     * Test if the angle is right (90°)
     *
     * @return  bool
     */
    public function isRight()
    {
        return (bool) ($this->getAngleToDeg() == 90);
    }

    /**
     * Test if the angle is straight (180°)
     *
     * @return  bool
     */
    public function isStraight()
    {
        return (bool) ($this->getAngleToDeg() == 180);
    }

    /**
     * Test if the angle is acute (< 90°)
     *
     * @return  bool
     */
    public function isAcute()
    {
        return (bool) ($this->getAngleToDeg() < 90);
    }

    /**
     * Test if the angle is obtuse (90° < 180°)
     *
     * @return  bool
     */
    public function isObtuse()
    {
        return (bool) ($this->getAngleToDeg() > 90 && $this->getAngleToDeg() < 180);
    }

    /**
     * Test if the angle is reflex (180° < 360°)
     *
     * @return  bool
     */
    public function isReflex()
    {
        return (bool) ($this->getAngleToDeg() > 180 && $this->getAngleToDeg() < 360);
    }
}
