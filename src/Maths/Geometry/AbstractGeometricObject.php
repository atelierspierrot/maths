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

use \Library\Helper\Text as TextHelper;
use \Maths\CartesianInterface;
use \Maths\Maths;
use \Maths\AbstractCartesianObject;
use \Maths\Geometry\Point;
use \Maths\Geometry\Segment;
use \Maths\PointInterface;

/**
 * @author  piwi <me@e-piwi.fr>
 */
abstract class AbstractGeometricObject
    extends AbstractCartesianObject
    implements CartesianInterface
{

    /**
     * Define here some `i` items
     * "i" may be lowercase only and is the point "name"
     * @var array
     */
    protected static $_magic_points_mapping = array();

    /**
     * @var     array   The table of object's points
     */
    protected $_points = array();

    /**
     * Construction of a cartesian object specify a number of space dimensions (default is 2D)
     *
     * @param   int     $type
     */
    public function __construct($type = Maths::CARTESIAN_2D)
    {
        parent::__construct($type);
    }

// Points

    /**
     * Define (or redefine) a point of the object
     *
     * @param   string                  $name
     * @param   \Maths\PointInterface $point
     * @throws  \InvalidArgumentException if the `$point` argument is not `\Maths\PointInterface` object
     * @throws  \InvalidArgumentException if the `$point` argument is not an object
     */
    public function setPoint($name, $point)
    {
        if (is_object($point)) {
            if (in_array('Maths\PointInterface', class_implements($point))) {
                $this->_points[$name] = $point;
            } else {
                throw new \InvalidArgumentException(
                    sprintf("A point of a geometric object must implement the Maths\\PointInterface (get class %s)", get_class($point))
                );
            }
        } else {
            throw new \InvalidArgumentException(
                sprintf("A point of a geometric object must be an object (get %s)", gettype($point))
            );
        }
    }

    /**
     * Get a point of the object
     *
     * @param   string                  $name
     * @return  \Maths\PointInterface
     */
    public function getPoint($name)
    {
        return isset($this->_points[$name]) ? $this->_points[$name] : null;
    }

// Segments

    /**
     * Get a [point1->point2] segment as a `\Maths\Geometry\Segment` object
     *
     * You can equally use `$obj->getSegment(a,b)` or `$obj->getSegment(ab)`
     *
     * @param   string          $name1 name of first point of the segment
     * @param   string|null     $name2 name of first point of the segment
     * @return  Segment
     * @throws  \InvalidArgumentException if the segmentation can't be constructed (wrong parameters)
     * @throws  \InvalidArgumentException if `$name1` is more than 2 chars length
     * @throws  \InvalidArgumentException if one of the points is not found
     */
    public function getSegment($name1, $name2 = null)
    {
        if (is_null($name2)) {
            $points = str_split($name1);
            if (count($points)==2) {
                foreach ($points as $i=>$_p) {
                    if (in_array(strtolower($_p), self::$_magic_points_mapping)) {
                        if ($i==0) {
                            $name1 = $_p;
                        } else {
                            $name2 = $_p;
                        }
                    } else {
                        throw new \InvalidArgumentException(
                            sprintf("Unknown segment '%s'", $name1)
                        );
                    }
                }
            } else {
                throw new \InvalidArgumentException(
                    sprintf("A segment must be a two points representation (got '%s')", $name1)
                );
            }
        }
        $p1 = $this->getPoint($name1);
        $p2 = $this->getPoint($name2);
        if (!is_null($p1) && !is_null($p2)) {
            return new Segment($p1, $p2);
        } else {
            throw new \InvalidArgumentException(
                sprintf("Unknown or undefined point name '%s'", (is_null($p1) ? $point1 : $point2))
            );
        }
    }

// Direct Access

    /**
     * @param   mixed   $name
     * @param   mixed   $value
     * @return  void
     * @throws  \Exception eventually caught
     */
    public function __set($name, $value)
    {
        $name = strtolower($name);
        if (array_key_exists($name, $this::$_magic_setters_mapping)) {
            $meth = $this::$_magic_setters_mapping[$name];
        } elseif (in_array($name, $this::$_magic_points_mapping)) {
            $meth = TextHelper::toCamelCase('set_point_'.$name);
        } else {
            $meth = TextHelper::toCamelCase('set_'.$name);
        }
        if (method_exists($this, $meth)) {
            try {
                call_user_func(array($this, $meth), $value);
            } catch (\Exception $e) {
                throw $e;
            }
        }
    }

    /**
     * @param   mixed   $name
     * @return  mixed
     */
    public function __get($name)
    {
        $name = strtolower($name);
        if (array_key_exists($name, $this::$_magic_getters_mapping)) {
            $meth = $this::$_magic_getters_mapping[$name];
        } elseif (in_array($name, $this::$_magic_points_mapping)) {
            $meth = TextHelper::toCamelCase('get_point_'.$name);
        } else {
            $meth = TextHelper::toCamelCase('get_'.$name);
        }
        if (method_exists($this, $meth)) {
            return call_user_func(array($this, $meth));
        }
    }

    /**
     * @param   mixed   $name
     * @return  bool
     */
    public function __isset($name)
    {
        $name = strtolower($name);
        if (array_key_exists($name, $this::$_magic_setters_mapping)) {
            $meth = $this::$_magic_setters_mapping[$name];
        } elseif (in_array($name, $this::$_magic_points_mapping)) {
            $meth = TextHelper::toCamelCase('get_point_'.$name);
        } else {
            $meth = TextHelper::toCamelCase('get_'.$name);
        }
        if (method_exists($this, $meth)) {
            return (bool) (call_user_func(array($this, $meth))!==null);
        }
    }

    /**
     * @param   mixed   $name
     * @return  void
     * @throws  \Exception eventually caught
     */
    public function __unset($name)
    {
        $name = strtolower($name);
        if (array_key_exists($name, $this::$_magic_setters_mapping)) {
            $meth = $this::$_magic_setters_mapping[$name];
        } elseif (in_array($name, $this::$_magic_points_mapping)) {
            $meth = TextHelper::toCamelCase('set_point_'.$name);
        } else {
            $meth = TextHelper::toCamelCase('set_'.$name);
        }
        if (method_exists($this, $meth)) {
            try {
                call_user_func(array($this, $meth), null);
            } catch (\Exception $e) {
                throw $e;
            }
        }
    }

// Abstract methods

    /**
     * Get the algebraic equation of the object
     *
     * @return  string
     */
    public function getEquation()
    {
        return $this->__equationToString();
    }

    /**
     * Force children classes to define a way to get the algebraic function of the object
     *
     * @return  string
     */
    abstract public function __equationToString();

}

// Endfile
