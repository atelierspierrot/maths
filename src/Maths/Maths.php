<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths;

use \Maths\PointInterface;
use \Maths\Geometry\Point;
use \Maths\Geometry\Line;
use \Maths\Geometry\Segment;

/**
 * Basic class Maths
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
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
/*
echo <<<TYPEOTHER
        var demo1 = brd.create('point', [{$line1->getPointA()->x},{$line1->getPointA()->y}], {
            name: 'a'
        });
        var demo2 = brd.create('point', [{$line1->getPointB()->x},{$line1->getPointB()->y}], {
            name: 'b'
        });
        var segment1 = brd.create('line', [demo1,demo2], {straightFirst:false,straightLast:false});

        var demo3 = brd.create('point', [{$intersectCE->x},{$intersectCE->y}], {
            name: 'c'
        });
        var demo4 = brd.create('point', [{$intersectDE->x},{$intersectDE->y}], {
            name: 'd'
        });
        var segment2 = brd.create('line', [demo3,demo4], {straightFirst:false,straightLast:false});

        var demo5 = brd.create('point', [{$e->x},{$e->y}], {
            name: 'e'
        });
        var segment3 = brd.create('line', [demo1,demo5], {straightFirst:false,straightLast:false,color:'#404040'});
        var segment4 = brd.create('line', [demo2,demo5], {straightFirst:false,straightLast:false,color:'#404040'});
        var segment5 = brd.create('line', [demo3,demo5], {straightFirst:false,straightLast:false,color:'#404040'});
        var segment6 = brd.create('line', [demo4,demo5], {straightFirst:false,straightLast:false,color:'#404040'});
TYPEOTHER;
*/
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
