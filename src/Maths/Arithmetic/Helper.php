<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/maths>
 */

namespace Maths\Arithmetic;

/**
 * Basic class for arithemtic
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
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

}

// Endfile
