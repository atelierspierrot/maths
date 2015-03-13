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
