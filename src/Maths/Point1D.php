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

namespace Maths;

use \Maths\Maths;
use \Maths\AbstractCartesianObject;
use \Maths\PointInterface;

/**
 * Basic 1D point
 *
 * @author  piwi <me@e-piwi.fr>
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
