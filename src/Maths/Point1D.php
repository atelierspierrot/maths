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
use \Maths\AbstractCartesianObject;
use \Maths\PointInterface;


/**
 * Basic 1D point
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Point1D
    extends AbstractCartesianObject
    implements PointInterface
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        0   => 'getAbscissa',
        'x' => 'getAbscissa',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        0   => 'setAbscissa',
        'x' => 'setAbscissa',
    );

    /**
     * @param   null|mixed    $abscissa
     */
    public function __construct($abscissa = null)
    {
        $this
            ->setSpaceType(Maths::CARTESIAN_1D)
            ->setAbscissa($abscissa);
    }

    /**
     * Write a 1D point as `( x )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa()
        ));
    }

    /**
     * Define the abscissa value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setAbscissa($val)
    {
        $this->_coordinates['abscissa'] = $val;
        return $this;
    }

    /**
     * Get the abscissa value of the point
     *
     * @return  mixed
     */
    public function getAbscissa()
    {
        return $this->_coordinates['abscissa'];
    }

}

// Endfile
