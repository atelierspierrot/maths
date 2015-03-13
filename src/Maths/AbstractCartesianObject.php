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
use \Library\Helper\Text as TextHelper;

/**
 * @author  piwi <me@e-piwi.fr>
 */
abstract class AbstractCartesianObject
    implements \ArrayAccess
{

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i`
     * "i" may be lowercase only
     * @var array
     */
    protected static $_magic_getters_mapping = array();

    /**
     * Define here some `i => method` items to access method `method` using `$obj->i = $val`
     * "i" may be lowercase only
     * @var array
     */
    protected static $_magic_setters_mapping = array();

    /**
     * @var     int     The space type
     */
    protected $_space_type;

    /**
     * @var     array   The table of object's coordinates
     */
    protected $_coordinates = array();

    /**
     * Construction of a cartesian object specify a number of space dimensions (default is 2D)
     *
     * @param   int     $type
     */
    public function __construct($type = Maths::CARTESIAN_2D)
    {
        $this->setSpaceType($type);
    }

// Space type

    /**
     * Define the object cartesian space type (number of dimensions)
     *
     * @param   int     $type
     * @return  $this
     */
    public function setSpaceType($type)
    {
        $this->_space_type = $type;
        return $this;
    }

    /**
     * Get the object cartesian space type (number of dimensions)
     *
     * @return  int
     */
    public function getSpaceType()
    {
        return $this->_space_type;
    }

    /**
     * Test if the object is in 1D only
     *
     * @return  bool
     */
    public function is1D()
    {
        return (bool) ($this->_space_type & Maths::CARTESIAN_1D);
    }

    /**
     * Test if the object is in 2D
     *
     * @return  bool
     */
    public function is2D()
    {
        return (bool) ($this->_space_type & Maths::CARTESIAN_2D);
    }

    /**
     * Test if the object is in 3D
     *
     * @return  bool
     */
    public function is3D()
    {
        return (bool) ($this->_space_type & Maths::CARTESIAN_3D);
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
        $_name = strtolower($name);
        $meth = (array_key_exists($_name, $this::$_magic_setters_mapping) ?
            $this::$_magic_setters_mapping[$_name] : TextHelper::toCamelCase('set_'.$_name));
        if (method_exists($this, $meth)) {
            try {
                call_user_func(array($this, $meth), $value);
            } catch (\Exception $e) {
                throw $e;
            }
        } else {
            $this->{$name} = $value;
        }
    }

    /**
     * @param   mixed   $name
     * @return  mixed
     */
    public function __get($name)
    {
        $_name = strtolower($name);
        $meth = (array_key_exists($_name, $this::$_magic_getters_mapping) ?
            $this::$_magic_getters_mapping[$_name] : TextHelper::toCamelCase('get_'.$_name));
        if (method_exists($this, $meth)) {
            return call_user_func(array($this, $meth));
        } elseif (property_exists($this, $name)) {
            return $this->{$name};
        }
    }

    /**
     * @param   mixed   $name
     * @return  bool
     */
    public function __isset($name)
    {
        $_name = strtolower($name);
        $meth = (array_key_exists($_name, $this::$_magic_getters_mapping) ?
            $this::$_magic_getters_mapping[$_name] : TextHelper::toCamelCase('get_'.$_name));
        if (method_exists($this, $meth)) {
            return (bool) (call_user_func(array($this, $meth))!==null);
        } else {
            return (bool) (property_exists($this, $name));
        }
    }

    /**
     * @param   mixed   $name
     * @return  void
     * @throws  \Exception eventually caught
     */
    public function __unset($name)
    {
        $_name = strtolower($name);
        $meth = (array_key_exists($_name, $this::$_magic_setters_mapping) ?
            $this::$_magic_setters_mapping[$_name] : TextHelper::toCamelCase('set_'.$_name));
        if (method_exists($this, $meth)) {
            try {
                call_user_func(array($this, $meth), null);
            } catch (\Exception $e) {
                throw $e;
            }
        } elseif (property_exists($this, $name)) {
            $this->{$name} = null;
        }
    }

// ArrayAccess interface

    /**
     * Test if an offset exists in the object using array notation `isset($obj[offset])`
     *
     * @param   mixed   $offset
     * @return  bool
     */
    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    /**
     * Get an object coordinate using array notation `$obj[offset]`
     *
     * @param   mixed   $offset
     * @return  bool
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * Set an object coordinate using array notation `$obj[offset] = value`
     *
     * @param   mixed   $offset
     * @param   mixed   $value
     * @throws  \Exception eventually caught
     */
    public function offsetSet($offset, $value)
    {
        try {
            $this->__set($offset, $value);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Set an object coordinate using array notation `unset($obj[offset])`
     *
     * @param   mixed   $offset
     * @throws  \Exception eventually caught
     */
    public function offsetUnset($offset)
    {
        try {
            $this->__unset($offset);
        } catch (\Exception $e) {
            throw $e;
        }
    }

// Abstract methods

    /**
     * Force children classes to define a way to `echo` an object, usually like `( x , y , z)`
     *
     * @return  string
     */
    abstract public function __toString();

}

// Endfile
