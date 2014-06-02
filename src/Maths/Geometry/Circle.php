<?php
/**
 * PHP Library package of Les Ateliers Pierrot
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/library>
 */

namespace Maths\Geometry;

use \Maths\AbstractGeometricObject;

/**
 * Class Circle
 *
 */
class Circle
    extends AbstractGeometricObject
{

    public $radius = 0;
    public $o = array();

    public function __construct()
    {
    }

    /**
     * @return  numeric
     */
    public function getDiameter()
    {
        return ($this->radius * 2);
    }

    /**
     * @return  numeric
     */
    public function getArea()
    {
        return (pi() * ($this->radius * $this->radius));
    }

    /**
     * @return  numeric
     */
    public function getPerimeter()
    {
        return (2 * pi() * $this->radius);
    }
    
    public function __toString()
    {
        return '';
    }

}
