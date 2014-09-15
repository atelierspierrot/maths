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
class PascalTriangle
{

    /**
     * @var array Caching table
     */
    public static $table = array();

    public function toString($limit = 10, $cell_delimiter = ' ', $line_delimiter = "\n")
    {
        $str = '';
        $table = self::getSuite($limit);
        foreach ($table as $line) {
            $str .= implode($cell_delimiter, $line).$line_delimiter;
        }
        return $str;
    }

    public static function getSuite($limit = 10)
    {
        $table = array();
        for ($i=0; $i<$limit; $i++) {
            for ($j=0; $j<=$i; $j++) {
                $table[$i][$j] = self::get($j, $i);
            }
        }
        return $table;
    }

    public static function get($col, $row)
    {
        if (!isset(self::$table[$col]) || !isset(self::$table[$col][$row])) {
            if (!isset(self::$table[$col])) {
                self::$table[$col] = array();
            }
            if ($col == 0 || $col == $row) {
                self::$table[$col][$row] = 1;
            } elseif ($col == 1 || $col == $row) {
                self::$table[$col][$row] = $row;
            } else {
                self::$table[$col][$row] = self::get($col, $row - 1) + self::get($col - 1, $row - 1);
            }
        }
        return self::$table[$col][$row];
    }

}

// Endfile
