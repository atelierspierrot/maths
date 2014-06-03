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
 * For a circle with center O(x,y) and a radius r:
 *
 *      (x - Ox)^2 + (y - Oy)^2 = r^2
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
     * Write a circle like `[circ. O(x,y),r=..]`
     *
     * @return  string
     */
    public function __toString()
    {
        return '[circ. O'
            .Maths::coordinatesToString(array($this->getPointO()->getAbscissa(), $this->getPointO()->getOrdinate()))
            .',r='.$this->getRadius().']';
    }

    /**
     * Write an algebric function of the circle
     *
     *      (x - Ox)^2 + (y - Oy)^2 = r^2
     *
     * @return  string
     */
    public function __equationToString()
    {
        $o = $this->getOrigin();
        return "y = f(x){ sqrt({$this->getRadius()}^2 - (x - {$o->getAbscissa()})^2) + {$o->getOrdinate()} }";
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

    /**
     * Define point O (origin) point of the circle
     *
     * @param   \Maths\PointInterface    $point
     * @return  $this
     * @throws  \Exception if the argument is not on of the `\Maths\PointInterface` classes
     */
    public function setOrigin($point)
    {
        try {
            $this->setPointO($point);
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
    public function getOrigin()
    {
        return $this->getPointO();
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
    public function getPerimeter()
    {
        return (2 * pi() * $this->getRadius());
    }

// Utilities

    /**
     * (x - Ox)^2 + (y - Oy)^2 = r^2
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a)
    {
        $o = $this->getPointO();
        return (bool) (
            ( pow(($a->getAbscissa() - $o->getAbscissa()), 2) + pow(($a->getOrdinate() - $o->getOrdinate()), 2) ) == pow($this->getRadius(), 2)
        );
    }

    /**
     * Get the ordinate of a point of the circle by its abscissa
     *
     * y = sqrt( r^2 - (x - Ox)^2 ) + Oy
     *
     * @param   float   $x
     * @return  float
     */
    public function getOrdinateByAbscissa($x)
    {
        $o = $this->getPointO();
        return ( sqrt( pow($this->getRadius(), 2) - pow(($x - $o->getAbscissa()), 2) ) + $o->getOrdinate() );
    }

    /**
     * Get the abscissa of a point of the circle by its ordinate
     *
     * x = sqrt( r^2 - (y - Oy)^2 ) + Ox
     *
     * @param   float   $y
     * @return  float
     */
    public function getAbscissaByOrdinate($y)
    {
        $o = $this->getPointO();
        return ( sqrt( pow($this->getRadius(), 2) - pow(($y - $o->getOrdinate()), 2) ) + $o->getAbscissa() );
    }

}
