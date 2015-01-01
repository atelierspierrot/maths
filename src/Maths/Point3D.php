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

namespace Maths;

use \Maths\Maths;
use \Maths\Point2D;
use \Maths\PointInterface;

/**
 * Basic 3D point
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Point3D
    extends Point2D
    implements PointInterface
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        0   => 'getAbscissa',
        'x' => 'getAbscissa',
        1   => 'getOrdinate',
        'y' => 'getOrdinate',
        2   => 'getApplicate',
        'z' => 'getApplicate',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        0   => 'setAbscissa',
        'x' => 'setAbscissa',
        1   => 'setOrdinate',
        'y' => 'setOrdinate',
        2   => 'setApplicate',
        'z' => 'setApplicate',
    );

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     * @param   null|mixed    $applicate
     */
    public function __construct($abscissa = null, $ordinate = null, $applicate = null)
    {
        parent::__construct($abscissa, $ordinate);
        $this
            ->setSpaceType(Maths::CARTESIAN_3D)
            ->setApplicate($applicate);
    }

    /**
     * Write a 3D point as `( x , y , z )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa(),
            $this->getOrdinate(),
            $this->getApplicate()
        ));
    }

    /**
     * Define the applicate value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setApplicate($val)
    {
        $this->_coordinates['applicate'] = $val;
        return $this;
    }

    /**
     * Get the applicate value of the point
     *
     * @return  mixed
     */
    public function getApplicate()
    {
        return $this->_coordinates['applicate'];
    }

}

// Endfile
