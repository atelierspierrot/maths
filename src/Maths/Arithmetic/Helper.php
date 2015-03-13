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

namespace Maths\Arithmetic;

/**
 * Basic class for arithemtic
 *
 * @author  piwi <me@e-piwi.fr>
 */
class Helper
{

    /**
     * Calculate the "factorial" resolution of a number: `a!`
     *
     * Be warmed that this will not throw an error in case `$a < 0`
     * but an empty string
     *
     * @param $n
     * @return int
     */
    public static function factorial($n)
    {
        return ($n<0 ? '' : ($n > 1 ? $n * self::factorial($n-1):1));
    }

    /**
     * Write a number as a float what ever value it is (< 0.0000000...)
     *
     * By default, PHP seems to write any number inferior to 0.0001 as a tenth power:
     *
     *      0.00005 becomes 5.0E-5
     *
     * This method will return:
     *
     *      0.00005
     *
     * @param float $a
     * @return string
     */
    public static function asFloat($a)
    {
        return (abs($a)>0.0001 ? $a : rtrim(sprintf("%0.40f", $a), 0));
    }

    /**
     * Get the n-th triangular numbet:
     *
     *      1           3           6       ...
     *      .           .           .
     *                 . .         . .
     *                            . . .
     *
     * @param   int   $n    Get the triangular number of `n`
     * @return  int
     */
    public static function getTriangularNumber($n)
    {
        return (($n * ($n + 1)) / 2);
    }

    /**
     * Try to get the "true" modulo
     *
     * @param $a
     * @param $b
     * @return float|int
     */
    public static function modulo($a,$b)
    {
        if (abs($b)>abs($a)) {
            return $a;
        }
        if ($a>0 && $b>0) {
            return ($a%$b);
        }
        return self::getModuloFromEntirePart($a,$b);
    }

    /**
     * This method is an alternative to the native `a % b` using the "entire part" method.
     * The result will always be in range `[0 ; b[` and have the same sign as `b`.
     *
     * @param $a
     * @param $b
     * @return float
     */
    public static function getModuloFromEntirePart($a,$b)
    {
        $div = round($a/$b, 0, (($a/$b)>=0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP));
        $a = round($a, 0, ($a>=0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP));
        $b = round($b, 0, ($b>=0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP));
        return ($a - ($div * $b));
    }

    /**
     * This method is an alternative to the native `a % b` using the loop method.
     * The result will always be in range `[0 ; a]` and have the same sign as `a`.
     *
     * This method is VERY slow but can be considered as the real calculation of a "modulo".
     *
     * @param $a
     * @param $b
     * @return int
     */
    public static function getModuloUsingTruncation($a,$b)
    {
        $a = round($a, 0, ($a>=0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP));
        $b = round($b, 0, ($b>=0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP));
        $tmp_a = $a;
        $ab = $a/$b;
        $counter = 0;
        while ($ab!==0 && ($ab!==round($ab,0))) {
            $counter++;
            if ($tmp_a>0) {
                $tmp_a = $a - $counter;
                $ab = $tmp_a/$b;
            } elseif ($tmp_a<0) {
                $tmp_a = $a + $counter;
                $ab = $tmp_a/$b;
            } else {
                $ab = 0;
            }
        }
        return ($a>=0 ? $counter : -$counter);
    }

    /**
     * Test if a number is an "narcissic" number: an n-digit number that is equal to the sum of the n'th powers of its digits
     *
     * @see https://en.wikipedia.org/wiki/Narcissistic_number
     * @param $a
     * @return bool
     */
    public static function isNarcissicNumber($a)
    {
        $sum = 0;
        for ($i=0;$i<strlen($a);$i++) {
            $sum += pow($a{$i},strlen($a));
        }
        return ($sum==$a);
    }

    /**
     * @see     self::isNarcissicNumber()
     * @param   $a
     * @return  bool
     */
    public static function isArmstrongNumber($a)
    {
        return self::isNarcissicNumber($a);
    }

    /**
     * Test if a number is an "happy number":
     *
     * Starting with any positive integer,
     * replace the number by the sum of the squares of its digits, and repeat the process until
     * the number equals 1 (where it will stay), or it loops endlessly in a cycle which does not include 1.
     *
     * @see     https://en.wikipedia.org/wiki/Happy_number
     * @param $val
     * @param int $iteration
     * @return bool
     */
    public static function isHappyNumber($val, $iteration = 0)
    {
        if ($val==1) {
            return true;
        }
        if ($val>0 && $iteration<50) {
            $items = str_split((string) $val);
            $count = 0;
            foreach ($items as $item) {
                $count += pow($item, 2);
            }
            if ($count == 1) {
                return true;
            }
            return self::isHappyNumber($count, $iteration+1);
        }
        return false;
    }

    /**
     * Make the "euclidean division" `a / b` having a result like `array( divisor , rest )`
     *
     * @param $a
     * @param $b
     * @return array
     * @throws \InvalidArgumentException if `$b == 0`
     */
    public static function EuclideanDivision($a, $b)
    {
        if ($b==0) {
            throw new \InvalidArgumentException('Division by 0 is not allowed!');
        }
        $divisor    = floor($a / $b);
        $rest       = ($a % $b);
        return array($divisor, $rest);
    }

    /**
     * Find the "GCD" (greatest common divisor) using the Euclide's algorithm
     *
     * @param $a
     * @param $b
     * @return int
     * @throws \InvalidArgumentException if $a or $b is negative
     */
    public static function GCD($a, $b)
    {
        if ($a<0 || $b<0) {
            throw new \InvalidArgumentException('GCD calculation of negative numbers is not allowed!');
        }
        if ($b===0) {
            return $a;
        }
        try {
            list(,$r) = self::EuclideanDivision($a, $b);
            return self::GCD($b, $r);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

}

// Endfile
