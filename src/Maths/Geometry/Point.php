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
use \Maths\Point3D;
use \Maths\PointInterface;

/**
 * Point class
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Point
    extends Point3D
    implements PointInterface
{

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     * @param   null|mixed    $applicate
     */
    public function __construct($abscissa = null, $ordinate = null, $applicate = null)
    {
        parent::__construct($abscissa, $ordinate, $applicate);
        $args = func_get_args();
        $this->setSpaceType(count($args)==3 ? \Maths\Maths::CARTESIAN_3D : (
            count($args)==2 ? \Maths\Maths::CARTESIAN_2D : \Maths\Maths::CARTESIAN_1D
        ));
    }

    /**
     * Write a 3D point as `( x , y , z )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(
            $this->is3D() ? array($this->getAbscissa(),$this->getOrdinate(),$this->getApplicate()) : (
                $this->is2D() ? array($this->getAbscissa(),$this->getOrdinate()) : array($this->getAbscissa())
            )
        );
    }

}

// Endfile
