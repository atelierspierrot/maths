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
use \Maths\Geometry\Line;
use \Maths\PointInterface;

/**
 * Segment class : two points A -> B
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Segment
    extends Line
{

    /**
     * Write a segment as `[(Ax,Ay),(Bx,By)]`
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
     * Write an algebraic function of the segment
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
