<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths\Geometry;

use \Maths\Maths;
use \Maths\Geometry\AbstractGeometricObject;
use \Maths\PointInterface;

/**
 * Class Circle
 *
 */
class Circle
    extends AbstractGeometricObject
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * @var array
     */
    protected static $_magic_getters_mapping = array(
        'o' => 'getPointO',
        'r' => 'getRadius',
    );

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * @var array
     */
    protected static $_magic_setters_mapping = array(
        'o' => 'setPointO',
        'r' => 'setRadius',
    );

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array(
        'o'
    );

    /**
     * @param   null|\Maths\PointInterface      $point_o
     * @param   null|int                        $radius
     * @param   int                             $space_type
     */
    public function __construct(
        PointInterface $point_o = null, $radius = null, $space_type = Maths::CARTESIAN_2D
    ) {
        parent::__construct($space_type);
        if (!is_null($point_o)) {
            $this->setPointO($point_o);
        }
        if (!is_null($radius)) {
            $this->setRadius($radius);
        }
    }

    /**
     * @return  string
     */
    public function __toString()
    {
        return '[circ. O'
            .Maths::coordinatesToString(array($this->getPointO()->getAbscissa(), $this->getPointO()->getOrdinate()))
            .',r='.$this->getRadius().']';
    }

// Points

    /**
     * Define the radius value of the circle
     *
     * @param   int|mixed   $val
     * @return  $this
     */
    public function setRadius($val)
    {
        $this->_coordinates['radius'] = $val;
        return $this;
    }

    /**
     * Get the radius value of the point
     *
     * @return  mixed
     */
    public function getRadius()
    {
        return $this->_coordinates['radius'];
    }

    /**
     * Define point O (origin) point of the circle
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setPointO($point)
    {
        try {
            $this->setPoint('o', $point);
        } catch (\Exception $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Get the O (origin) point of the circle
     *
     * @return  \Maths\PointInterface|null
     */
    public function getPointO()
    {
        return (isset($this->_points['o']) ? $this->_points['o'] : null);
    }

// Characteristics

    /**
     * @return  float
     */
    public function getDiameter()
    {
        return ($this->getRadius() * 2);
    }

    /**
     * @return  float
     */
    public function getArea()
    {
        return (pi() * ($this->getRadius() * $this->getRadius()));
    }

    /**
     * @return  float
     */
    public function getPerimeter()
    {
        return (2 * pi() * $this->getRadius());
    }
    
}
