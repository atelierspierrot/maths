<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths\Geometry;

use \Maths\Geometry\Rectangle;

/**
 * Class Right Triangle
 *
 * - triangle ABC
 * - right angle in B
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
 */
class RightTriangle
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
