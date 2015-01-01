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

namespace Maths;

use \Maths\Maths;
use \Maths\Point1D;
use \Maths\PointInterface;

/**
 * Basic 2D point
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Point2D
    extends Point1D
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
    );

    /**
     * @param   null|mixed    $abscissa
     * @param   null|mixed    $ordinate
     */
    public function __construct($abscissa = null, $ordinate = null)
    {
        parent::__construct($abscissa);
        $this
            ->setSpaceType(Maths::CARTESIAN_2D)
            ->setOrdinate($ordinate);
    }

    /**
     * Write a 2D point as `( x , y )`
     *
     * @return  string
     */
    public function __toString()
    {
        return Maths::coordinatesToString(array(
            $this->getAbscissa(),
            $this->getOrdinate()
        ));
    }

    /**
     * Define the ordinate value of the point
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setOrdinate($val)
    {
        $this->_coordinates['ordinate'] = $val;
        return $this;
    }

    /**
     * Get the ordinate value of the point
     *
     * @return  mixed
     */
    public function getOrdinate()
    {
        return $this->_coordinates['ordinate'];
    }

}

// Endfile
