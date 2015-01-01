<?php
/**
 * Some PHP classes to do mathematics
 * Copyright (c) 2014-2015 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License Apache-2.0 <http://www.apache.org/licenses/LICENSE-2.0>
 * Sources <http://github.com/atelierspierrot/maths>
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
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Geometry\Segment;
use \Maths\PointInterface;
use \Maths\Geometry\Point;


/**
 * Basic Vector
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Vector
    extends Segment
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        0   => 'getPointA',
        1   => 'getPointB',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        0   => 'setPointA',
        1   => 'setPointB',
    );

    /**
     * Write a vector
     *
     * @return  string
     */
    public function __toString()
    {
        return "[~ "
            .Maths::coordinatesToString(array(
                $this->getPointA()->getAbsissa(), $this->getPointA()->getOrdinate()
            ))
            .','
            .Maths::coordinatesToString(array(
                $this->getPointB()->getAbsissa(), $this->getPointB()->getOrdinate()
            ))
            ."]";
    }

    /**
     * Write a vector formula: `||~v|| = sqrt( x^2 + y^2 )`
     *
     * @return  string
     */
    public function __equationToString()
    {
        return $this->__toString();
    }

// Points

    /**
     * Define the origin of the vector (point A)
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setOrigin($point)
    {
        try {
            $this->setPointA($point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the origin of the vector (point A)
     *
     * @return  \Maths\PointInterface|null
     */
    public function getOrigin()
    {
        return $this->getPointA();
    }

// Characteristics

    /**
     * Get vector's direction
     *
     * @return  array
     */
    public function getDirection()
    {
        return Maths::getDirectionByPoints($this->getPointA(), $this->getPointB());
    }

    /**
     * Get vector's magnitude (length)
     *
     * @return  float
     */
    public function getMagnitude()
    {
        return $this->getLength();
    }

// Specials

    /**
     * Test if a vector is null : [~0] = [A==B]
     *
     * @return  bool
     */
    public function isNull()
    {
        return (bool) Maths::areSamePoint($this->getPointA(), $this->getPointB());
    }

// Shortcuts

    /**
     * Create a vector with one point from origin O like `[~ O->A]`
     *
     * @param   PointInterface  $point_a
     * @return  $this
     */
    public function createFromOrigin(PointInterface $point_a)
    {
        $this
            ->setPointA(new Point(0,0))
            ->setPointB($point_a)
            ;
        return $this;
    }

}

// Endfile
