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
