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
use \Maths\Geometry\Quadrilateral;
use \Maths\Geometry\Segment;

/**
 * Class Rectangle
 *
 *      D       C
 *      ---------
 *      |       |
 *      ---------
 *      A       B
 *  y
 *  ↑ → x
 *
 * @author  piwi <me@e-piwi.fr>
 */
class Rectangle
    extends Quadrilateral
{

    /**
     * @param   null|\Maths\Point(s)    $point_a
     * @param   null|\Maths\Point(s)    $point_b
     * @param   null|\Maths\Point(s)    $point_c
     * @param   null|\Maths\Point(s)    $point_d
     * @param   int                             $space_type
     */
    public function __construct(
        $point_a = null, $point_b = null, $point_c = null, $point_d = null,
        $space_type = Maths::CARTESIAN_2D
    ) {
        parent::__construct(
            $point_a, $point_b, $point_c, $point_d, $space_type
        );
    }

// Characteristics

    /**
     * Get rectangle's width (by convention width > height)
     *
     * @return  numeric
     */
    public function getWidth()
    {
        return max(array(
            ($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa()),
            ($this->getPointD()->getOrdinate() - $this->getPointA()->getOrdinate())
        ));
    }

    /**
     * Get rectangle's height (by convention width > height)
     *
     * @return  numeric
     */
    public function getHeight()
    {
        return min(array(
            ($this->getPointB()->getAbscissa() - $this->getPointA()->getAbscissa()),
            ($this->getPointD()->getOrdinate() - $this->getPointA()->getOrdinate())
        ));
    }

    /**
     * @return  numeric
     */
    public function getArea()
    {
        return ($this->getWidth() * $this->getHeight());
    }

    /**
     * @return  numeric
     */
    public function getPerimeter()
    {
        return ($this->getWidth() + $this->getHeight()) * 2;
    }
    
// Specials

    /**
     * @param   array   ( Ax , Ay , Cx, Cy )
     */
    public function createFromCoordinates(array $coords)
    {
        return $this
            ->setA(array( 'x'=>$coords[0], 'y'=>$coords[1] ))
            ->setB(array( 'x'=>$coords[2], 'y'=>$coords[1] ))
            ->setC(array( 'x'=>$coords[0], 'y'=>$coords[3] ))
            ->setD(array( 'x'=>$coords[2], 'y'=>$coords[3] ))
            ;
    }

}
