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

use \Maths\Geometry\Rectangle;

/**
 * Class Rectangle
 *
 * - rectangle in B
 * - 'alpha' angle is [cAb]
 * - 'beta' angle is [aCb]
 *
 *           C
 *         / |
 *        /  |
 *       /   |
 *      ------
 *     A      B
 *  y
 *  ↑ → x
 *
 * @author  piwi <me@e-piwi.fr>
 */
class TriangleRectangle 
    extends Rectangle
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createFromWidthAndAlpha(array $coords)
    {
        $width  = $coords[0];
        $alpha  = $coords[1];
        $height = tan(deg2rad($alpha)) * $width;
        return $this->createFromCoordinates(array(
            0, 0, $width, $height
        ));
    }

    public function getAlpha()
    {
        return rad2deg(acos($this->getWidth() / $this->getHypotenuse()));
    }

    public function getBeta()
    {
        return rad2deg(acos($this->getHeight() / $this->getHypotenuse()));
    }

    /**
     * @return  numeric
     */
    public function getHypotenuse()
    {
        return sqrt(pow($this->getWidth(), 2) + pow($this->getHeight(), 2));
    }

    /**
     * @return  numeric
     */
    public function getArea()
    {
        return (($this->getWidth() + $this->getHeight()) / 2);
    }

    /**
     * @return  numeric
     */
    public function getPerimeter()
    {
        return ($this->getWidth() + $this->getHeight() + $this->getHypotenuse());
    }
    
    public function __toString()
    {
        return
            parent::__toString()
            ."hypotenuse is '$this->hypotenuse'".PHP_EOL
            ."alpha angle is '$this->alpha' & beta angle is '$this->beta'".PHP_EOL
            ;
    }

}
