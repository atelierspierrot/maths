<?php
/**
 * Some PHP classes to do mathematics
 * Copyright (c) 2014-2015 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License Apache-2.0 <http://www.apache.org/licenses/LICENSE-2.0>
 * Sources <http://github.com/atelierspierrot/maths>
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
 */

namespace Maths;

use \Maths\PointInterface;
use \Maths\Geometry\Point;
use \Maths\Geometry\Line;
use \Maths\Geometry\Segment;

/**
 * Basic class Maths
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
class Maths
{

    /**
     */
    const CARTESIAN_1D  = 1;

    /**
     */
    const CARTESIAN_2D  = 2;

    /**
     */
    const CARTESIAN_3D  = 4;


    /**
     */
    const ABSCISSA    = 'x';

    /**
     */
    const ORDINATE    = 'y';

    /**
     */
    const RATE        = 'z';


    /**
     */
    const ORIGIN      = 0;

    /**
     */
    const RIGHT_ANGLE = 90;

    /**
     */
    const DIRECTION_POSITIVE    = 1;

    /**
     */
    const DIRECTION_NEGATIVE    = -1;

    /**
     */
    const DIRECTION_NULL        = 0;

    /**
     * Infinity expression
     */
    const INFINITY              = null;

// ToString utilities

    /**
     * @param   string|array    $coordinates
     * @return  string
     */
    public static function coordinatesToString($coordinates)
    {
        if (!is_array($coordinates)) {
            $coordinates = array( $coordinates );
        }
        return '('.join(',', $coordinates).')';
    }

    /**
     * @param   string|array    $coordinates_a
     * @param   string|array    $coordinates_b
     * @return  string
     */
    public static function segmentToString($coordinates_a, $coordinates_b)
    {
        return self::polygonToString($coordinates_a,$coordinates_b);
    }

    /**
     * @return  string
     */
    public static function polygonToString()
    {
        $data = array();
        foreach (func_get_args() as $arg) {
            $data[] = self::coordinatesToString($arg);
        }
        return '['.join(',', $data).']';
    }

// Comparisons utilities

    /**
     * Test if two points are in the same space type
     *
     * @param   \Maths\PointInterface $point1
     * @param   \Maths\PointInterface $point2
     * @return  bool
     */
    public static function areSameSpace(PointInterface $point1, PointInterface $point2)
    {
        return (bool) (
            ($point1->is1D() && $point2->is1d()) ||
            ($point1->is2D() && $point2->is2d()) ||
            ($point1->is3D() && $point2->is3d())
        );
    }

    /**
     * Test if two points are in the same position
     *
     * @param   \Maths\PointInterface $point1
     * @param   \Maths\PointInterface $point2
     * @return  bool
     * @throws  \InvalidArgumentException if the two points are not in the same space type
     */
    public static function areSamePoint(PointInterface $point1, PointInterface $point2)
    {
        if (self::areSameSpace($point1, $point2)) {
            if ($point1->is1D()) {
                return (bool) ($point1->getAbscissa()==$point2->getAbscissa());
            } elseif ($point1->is2D()) {
                return (bool) (
                    ($point1->getAbscissa()==$point2->getAbscissa()) &&
                    ($point1->getOrdinate()==$point2->getOrdinate())
                );
            } elseif ($point1->is3D()) {
                return (bool) (
                    ($point1->getAbscissa()==$point2->getAbscissa()) &&
                    ($point1->getOrdinate()==$point2->getOrdinate()) &&
                    ($point1->getApplicate()==$point2->getApplicate())
                );
            }
        } else {
            throw new \InvalidArgumentException(
                "Can not compare positions of two points of different space types"
            );
        }
    }

    /**
     * Get the intersection point between two lines
     *
     *      y = (A1 * x) + B1  &&  y = (A2 * x) + B2
     *      x = (B2 - B1) / (A1 - A2)
     *
     * @param   \Maths\Geometry\Line    $line1
     * @param   \Maths\Geometry\Line    $line2
     * @return  \Maths\Geometry\Point
     */
    public static function getLinesIntersection(Line $line1, Line $line2)
    {
        $div = ($line1->getSlope() - $line2->getSlope());
        $x = ($div!=0 ?
            (($line2->getYIntercept() - $line1->getYIntercept()) / $div) : ($line2->getYIntercept() - $line1->getYIntercept()));
        $y = $line1->getOrdinateByAbscissa($x);
        return new Point($x,$y);
    }


    /**
     * Test if two segments are perpendiculars
     *
     * This will test it two lines are perpendiculars constructing a triangle and
     * testing if it is perpendicular
     *
     * @param   \Maths\Geometry\Line     $line1
     * @param   \Maths\Geometry\Line     $line2
     * @return  bool
     */
    public function arePerpendiculars(Line $line1, Line $line2)
    {
        if (self::areParallels($line1, $line2)) {
            return false;
        }

    }

    /**
     * Test if two segments are parallels
     *
     * This will test if the two lines drawn from the two segments verify the Thales theorem
     * by comparing [ab] (segment 1), [cd] (segment 2) and a fifth point [e] used to build
     * triangles:
     *
     *      [ae]/[ce] == [be]/[de] ?
     *
     * @param   \Maths\Geometry\Line     $line1
     * @param   \Maths\Geometry\Line     $line2
     * @return  bool
     */
    public static function areParallels(Line $line1, Line $line2)
    {
        if (
            ($line1->isHorizontal() && $line2->isHorizontal()) ||
            ($line1->isVertical() && $line2->isVertical())
        ) {
            return true;
        }
        $line1->rearrange();
        $line2->rearrange();
        $abs = array(
            $line1->getPointA()->getAbscissa(),
            $line1->getPointB()->getAbscissa(),
            $line2->getPointA()->getAbscissa(),
            $line2->getPointB()->getAbscissa()
        );
        $ords = array(
            $line1->getPointA()->getOrdinate(),
            $line1->getPointB()->getOrdinate(),
            $line2->getPointA()->getOrdinate(),
            $line2->getPointB()->getOrdinate()
        );
        $e = new Point(
            rand(0,10) + (max($abs) + abs(min($abs))),
            rand(0,10) + (max($ords) + abs(min($ords)))
        );
        $segAE = new Segment($line1->getPointA(), $e);
        $segBE = new Segment($line1->getPointB(), $e);

        $intersectCE = self::getLinesIntersection($segAE, $line2);
        $segCE = new Segment($intersectCE, $e);
        $intersectDE = self::getLinesIntersection($segBE, $line2);
        $segDE = new Segment($intersectDE, $e);

        return (bool) (($segAE->getLength() / $segCE->getLength()) == ($segBE->getLength() / $segDE->getLength()));
    }

    /**
     * Get the directions between two points for each axis
     *
     * This will return an array with the value `1,-1,0` for each axis.
     *
     * @param   PointInterface  $point1
     * @param   PointInterface  $point2
     * @return  array
     * @throws  \InvalidArgumentException
     */
    public static function getDirectionByPoints(PointInterface $point1, PointInterface $point2)
    {
        if (self::areSameSpace($point1, $point2)) {
            $directions = array(
                0 => self::getDirectionByCoordinates($point1->getAbscissa(), $point2->getAbscissa())
            );
            if ($point1->is2D() || $point1->is3D()) {
                $directions[1] = self::getDirectionByCoordinates($point1->getOrdinate(), $point2->getOrdinate());
            }
            if ($point1->is3D()) {
                $directions[2] = self::getDirectionByCoordinates($point1->getApplicate(), $point2->getApplicate());
            }
            return $directions;
        } else {
            throw new \InvalidArgumentException(
                "Can not guess directions between two points of different space types"
            );
        }
    }

    /**
     * Get the directions between two points
     *
     * This will return:
     *
     * -    `1` if [a->b] evolves in positive direction
     * -    `-1` if [a->b] evolves in negative direction
     * -    `0` if [a->b] does not evolve (same point)
     *
     * @param   int  $a
     * @param   int  $b
     * @return  int
     */
    public static function getDirectionByCoordinates($a, $b)
    {
        if ($a < $b) {
            return self::DIRECTION_POSITIVE;
        } elseif ($a > $b) {
            return self::DIRECTION_NEGATIVE;
        } else {
            return self::DIRECTION_NULL;
        }
    }

}

// Endfile
