<?php
/**
 * PHP Library package of Les Ateliers Pierrot
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/library>
 */

namespace Maths;

/**
 * Class Matrix
 *
 * Bidimensional array representation of a matrix.
 * Each matrix's item is indexed like `x,y` with first item indexed `1,1` (1 based).
 *
 * ## Iterate over items: the `WALK_` flags
 *
 * When iterating over a matrix, you can use one of the three `WALK_` flags to have following behaviors:
 *
 * -    `WALK_X` to iterate over lines (each item is the current line array of cells)
 * -    `WALK_Y` to iterate over columns (each item is the current column array of cells)
 * -    `WALK_XY` to iterate over cells (each item is the current cell)
 *
 * The default behavior uses the `WALK_XY` flag.
 *
 * ## Array access: the `ARRAY_` flags
 *
 * When using a matrix by direct array access (e.g. `$martrix[index]`), you can use one of the
 * `ARRAY_` flags to have the following behaviors:
 *
 * -    `ARRAY_XY` to use `$index` like a bidimensional offset (e.g. `x,y`)
 * -    `ARRAY_INT` to use `$index` as an integer representation of each cell position (e.g. `1,3` would by `4`)
 *
 * Using the positional offsets, indexes can be written as:
 *
 * -    `int` to set a `x` index
 * -    `,int` to set an `y` index
 * -    `int,int` to set a `x,y` index
 *
 * Using the integer access, you MUST keep in mind that the indexes are 0 based:
 *
 *      position `1,1` is index `0`
 *      position `1,3` is index `4`
 *      position `2,4` is index `7` (with 4 cells per line)
 *
 * The "positional" indexing can be forced in all cases using explicitly a string index with `matrix['x']`.
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class Matrix
    implements ArrayAccess, SeekableIterator, Countable, Serializable
{

    /**
     * Use this constant to use array access with indexes as positions
     *
     * A position can be used as: `x`, `,y` or `x,y`
     */
    const ARRAY_XY     = 1;

    /**
     * Use this constant to use array access with indexes as integers
     */
    const ARRAY_INT    = 2;

    /**
     * Use this constant to loop over lines
     */
    const WALK_X       = 1;

    /**
     * Use this constant to loop over columns
     */
    const WALK_Y       = 2;

    /**
     * Use this constant to loop over cells
     */
    const WALK_XY      = 4;

    /**
     * Character used to identify a full positional index, here like `x,y`
     */
    const XY_SEPARATOR  = ',';

    /**
     * @var     int     Current value of object iterations flag
     */
    protected $_walk_flag       = null;

    /**
     * @var     int     Current value of object array accesses flag
     */
    protected $_array_flag      = null;

    /**
     * @var     array   Original array passed to constructor
     * @see     self::reset()
     */
    protected $_cache   = array();

    /**
     * @var     mixed   Value of an empty cell (on 'unset' and padding) ; default is '0'
     */
    protected $_empty_cell = 0;

    /**
     * @var     array   Current matrix sizes: `_size[x]` for lines, `_size[y]` for columns & `_size[c]` for cells
     */
    var $_size          = array('x'=>0, 'y'=>0, 'c'=>0);

    /**
     * @var     array   Current matrix values 2D array
     */
    var $data           = array();

    /**
     * @var     int     Current `x` index value 1 based
     */
    var $x              = null;

    /**
     * @var     int     Current `y` index value 1 based
     */
    var $y              = null;

    /**
     * MATRIX constructor
     *
     * Any missing item in a sub-array will be replaced by `$empty_cell`.
     *
     * @param   array   $data
     * @param   int     $walk_flag
     * @param   int     $array_flag
     * @param   mixed   $empty_cell
     * @throws  InvalidArgumentException if `$data` is not a 2D array
     */
    public function __construct(
        array $data = null, $walk_flag = self::WALK_XY, $array_flag = self::ARRAY_XY, $empty_cell = 0
    ) {
        $this->setWalkFlag($walk_flag);
        $this->setArrayFlag($array_flag);
        $this->setEmptyCell($empty_cell);
        if (!is_null($data)) {
            try {
                $this->setData($data);
            } catch (InvalidArgumentException $e) {
                throw $e;
            }
        }
    }

    /**
     * Magic method to `echo $object` which returns a 2D representation of the matrix
     *
     * @return  string
     */
    public function __toString()
    {
        $str = '';
        foreach ($this->data as $i=>$cell) {
            $str .= join(' ', $cell).PHP_EOL;
        }
        return $str;
    }

// Setters & Getters

    /**
     * Reset object `$data` to its original state
     */
    public function reset()
    {
        $this->data = $this->_cache;
        $this->rewindXY();
    }

    /**
     * Get the matrix size
     *
     * @param   string  $which
     * @return  int|array
     */
    public function getSize($which = null)
    {
        if (!empty($which)) {
            return (isset($this->_size[$which]) ? $this->_size[$which] : null);
        } else {
            return $this->_size;
        }
    }

    /**
     * Define the object's walk flag
     *
     * @param   int     $flag
     * @param   bool    $auto_rewind
     * @return  $this
     */
    public function setWalkFlag($flag, $auto_rewind = true)
    {
        $this->_walk_flag = $flag;
        if (true==$auto_rewind) {
            $this->rewindXY();
        }
        return $this;
    }

    /**
     * Get the current object's walk flag
     *
     * @return  int
     */
    public function getWalkFlag()
    {
        return $this->_walk_flag;
    }

    /**
     * Define the object's array access flag
     *
     * @param   int     $flag
     * @param   bool    $auto_rewind
     * @return  $this
     */
    public function setArrayFlag($flag, $auto_rewind = true)
    {
        $this->_array_flag = $flag;
        if (true==$auto_rewind) {
            $this->rewindXY();
        }
        return $this;
    }

    /**
     * Get the current object's array access flag
     *
     * @return  int
     */
    public function getArrayFlag()
    {
        return $this->_array_flag;
    }

    /**
     * Set the empty cell value
     *
     * @param   mixed     $cell
     * @return  $this
     */
    public function setEmptyCell($cell)
    {
        $this->_empty_cell = $cell;
        return $this;
    }

    /**
     * Get the empty cell value
     *
     * @return  mixed
     */
    public function getEmptyCell()
    {
        return $this->_empty_cell;
    }

    /**
     * Set the matrix contents
     *
     * @param   array   $data
     * @return  void
     * @throws  InvalidArgumentException if `$data` is not a 2D array
     */
    public function setData(array $data = null)
    {
        $line_length = $column_length = 0;
        foreach ($data as $x=>$items) {
            if (!is_array($items)) {
                throw new InvalidArgumentException(
                    "Data parameter of matrix must be a 2 dimensional array (array of arrays)!"
                );
            }
            if (count($items)>$line_length) {
                $line_length = count($items) - 1;
            }
            foreach ($items as $subitems) {
                if (count($subitems)>$column_length) {
                    $column_length = count($subitems) - 1;
                }
            }
        }
        $this->_size = array(
            'x' => $line_length,
            'y' => $column_length,
            'c' => ($line_length * $column_length)
        );
        foreach ($data as $x=>$items) {
            $this->data[$x] = $this->_padLine($items);
        }
        $this->_cache = $this->data;
    }

    /**
     * Get the matrix as array
     *
     * @return  array|Traversable
     */
    public function getData()
    {
        return $this->data;
    }

// Matrix Setters / Getters

    /**
     * Get a cell value by index according to matrix's flags
     *
     * @param   string|int     $index
     * @return  mixed|null
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     * @see     self::getX()
     * @see     self::getY()
     * @see     self::getXY()
     * @see     self::getInt()
     */
    public function get($index)
    {
        try {
            if (is_string($index)) {
                if ($this->getWalkFlag() & self::WALK_X) {
                    $ret = $this->getX($index);
                } elseif ($this->getWalkFlag() & self::WALK_Y) {
                    $ret = $this->getY($index);
                } else {
                    $ret = $this->getXY($index);
                }
            } else {
                $ret = $this->getInt($index);
            }
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $ret;
    }

    /**
     * Get `x` value (line) by index
     *
     * @param   string|int     $index
     * @return  array
     * @throws  OutOfRangeException if the index is out of range
     */
    public function getX($index)
    {
        try {
            $ret = $this
                ->seekX($index)
                ->currentX();
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $ret;
    }

    /**
     * Get `y` value (column) by index
     *
     * @param   string|int     $index
     * @return  array
     * @throws  OutOfRangeException if the index is out of range
     */
    public function getY($index)
    {
        try {
            $ret = $this
                ->seekY($index)
                ->currentY();
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $ret;
    }

    /**
     * Get `x:y` value (cell) by positional index
     *
     * @param   string|int     $index
     * @return  mixed
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function getXY($index)
    {
        try {
            $ret = $this
                ->seekXY($index)
                ->currentXY();
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $ret;
    }

    /**
     * Get `x:y` value (cell) by integer index
     *
     * @param   int     $index
     * @return  mixed
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function getInt($index)
    {
        try {
            $ret = $this
                ->seekInt($index)
                ->currentXY();
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $ret;
    }

    /**
     * Set a value by index according to matrix's flags
     *
     * @param   string|int   $index
     * @param   mixed        $value
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     * @see     self::setX()
     * @see     self::setY()
     * @see     self::setXY()
     * @see     self::setInt()
     */
    public function set($index, $value)
    {
        try {
            if (is_string($index)) {
                if ($this->getWalkFlag() & self::WALK_X) {
                    $this->setX($index, $value);
                } elseif ($this->getWalkFlag() & self::WALK_Y) {
                    $this->setY($index, $value);
                } else {
                    $this->setXY($index, $value);
                }
            } else {
                $this->setInt($index, $value);
            }
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Set `x` value (line) by index
     *
     * @param   string|int  $index
     * @param   array       $value
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     */
    public function setX($index, array $value)
    {
        try {
            $this->seekX($index);
            $this->data[$this->keyX(true)] = $value;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Set `y` value (column) by index
     *
     * @param   string|int  $index
     * @param   array       $value
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     */
    public function setY($index, array $value)
    {
        try {
            $this->seekY($index);
            foreach ($this->data as $x=>$items) {
                $this->data[$x][$this->keyY(true)] = $value[$x];
            }
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Set `x:y` value (cell) by positional index
     *
     * @param   string      $index
     * @param   mixed       $value
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function setXY($index, $value)
    {
        try {
            $this->seekXY($index);
            $this->data[$this->keyX(true)][$this->keyY(true)] = $value;
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Set `x:y` value (cell) by integer index
     *
     * @param   int      $index
     * @param   mixed    $value
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function setInt($index, $value)
    {
        try {
            $this->seekInt($index);
            $this->data[$this->keyX(true)][$this->keyY(true)] = $value;
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

// Iterator Interface

    /**
     * Rewind a matrix according to its flag value
     *
     * @return  $this
     * @see     self::rewindX()
     * @see     self::rewindY()
     * @see     self::rewindXY()
     */
    public function rewind()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->rewindX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->rewindY();
        } else {
            return $this->rewindXY();
        }
    }

    /**
     * Rewind `x` index to position `1`
     *
     * @return  $this
     */
    public function rewindX()
    {
        $this->x = 1;
        return $this;
    }

    /**
     * Rewind `y` index to position `1`
     *
     * @return  $this
     */
    public function rewindY()
    {
        $this->y = 1;
        return $this;
    }

    /**
     * Rewind both `x` and `y` indexes to position `1,1`
     *
     * @return  $this
     */
    public function rewindXY()
    {
        $this->x = 1;
        $this->y = 1;
        return $this;
    }

    /**
     * Go to previous index according to matrix's flag value
     *
     * @return  $this
     * @see     self::previousX()
     * @see     self::previousY()
     * @see     self::previousXY()
     */
    public function previous()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->previousX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->previousY();
        } else {
            return $this->previousXY();
        }
    }

    /**
     * Seek to current `x` less 1
     *
     * @return  $this
     */
    public function previousX()
    {
        if ($this->previousXExists()) {
            $this->seekX($this->keyX()-1);
        } else {
            $this->x = null;
        }
        return $this;
    }

    /**
     * Test if current `x` less 1 exists
     *
     * @return  bool
     */
    public function previousXExists()
    {
        return (($this->keyX()-1)>0);
    }

    /**
     * Seek to current `y` less 1
     *
     * @return  $this
     */
    public function previousY()
    {
        if ($this->previousYExists()) {
            $this->seekY($this->keyY()-1);
        } else {
            $this->y = null;
        }
        return $this;
    }

    /**
     * Test if current `y` less 1 exists
     *
     * @return  bool
     */
    public function previousYExists()
    {
        return (($this->keyY()-1)>0);
    }

    /**
     * Seek to previous cell
     *
     * @return  $this
     */
    public function previousXY()
    {
        if (($this->keyY()-1)>0) {
            $this->seekY($this->keyY()-1);
        } else {
            if (($this->keyX()-1)>0) {
                $this->rewindY();
                $this->seekX($this->keyX()-1);
            } else {
                $this->x = null;
                $this->y = null;
            }
        }
        return $this;
    }

    /**
     * Go to next index according to matrix's flag value
     *
     * @return  $this
     * @see     self::nextX()
     * @see     self::nextY()
     * @see     self::nextXY()
     */
    public function next()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->nextX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->nextY();
        } else {
            return $this->nextXY();
        }
    }

    /**
     * Seek to current `x` plus 1
     *
     * @return  $this
     */
    public function nextX()
    {
        if ($this->nextXExists()) {
            $this->seekX($this->keyX()+1);
        } else {
            $this->x = null;
        }
        return $this;
    }

    /**
     * Test if current `x` plus 1 exists
     *
     * @return  bool
     */
    public function nextXExists()
    {
        return (($this->keyX()+1)<=$this->countX());
    }

    /**
     * Seek to current `y` plus 1
     *
     * @return  $this
     */
    public function nextY()
    {
        if ($this->nextYExists()) {
            $this->seekY($this->keyY()+1);
        } else {
            $this->y = null;
        }
        return $this;
    }

    /**
     * Test if current `y` plus 1 exists
     *
     * @return  bool
     */
    public function nextYExists()
    {
        return (($this->keyY()+1)<=$this->countY());
    }

    /**
     * Go to next cell
     *
     * @return  $this
     */
    public function nextXY()
    {
        if (($this->keyY()+1)<=$this->countY()) {
            $this->seekY($this->keyY()+1);
        } else {
            if (($this->keyX()+1)<=$this->countX()) {
                $this->rewindY();
                $this->seekX($this->keyX()+1);
            } else {
                $this->x = null;
                $this->y = null;
            }
        }
        return $this;
    }

    /**
     * Seek to index according to matrix's flag value
     *
     * @param   string  $index
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function seek($index)
    {
        try {
            if ($this->getWalkFlag() & self::WALK_X) {
                return $this->seekX($index);
            } elseif ($this->getWalkFlag() & self::WALK_Y) {
                return $this->seekY($index);
            } else {
                return $this->seekXY($index);
            }
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
    }

    /**
     * Seek to index for `x` (line)
     *
     * @param   int  $index
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     */
    public function seekX($index)
    {
        if ($index>0 && $index<=$this->countX()) {
            $this->x = $index;
        } else {
            throw new OutOfRangeException(
                "Index '{$index}' for scope 'x' is out of range of available data"
            );
        }
        return $this;
    }

    /**
     * Seek to index for `y` (column)
     *
     * @param   int  $index
     * @return  $this
     * @throws  OutOfRangeException if the index is out of range
     */
    public function seekY($index)
    {
        if ($index>0 && $index<=$this->countY()) {
            $this->y = $index;
        } else {
            throw new OutOfRangeException(
                "Index '{$index}' for scope 'y' is out of range of available data"
            );
        }
        return $this;
    }

    /**
     * Seek to index for `x,y` (cell)
     *
     * @param   string  $index  The index to go to, constructed like `x,y`
     * @return  $this
     * @throws  OutOfRangeException if the `x` index is out of range
     * @throws  OutOfRangeException if the `y` index is out of range
     * @throws  InvalidArgumentException if the argument is malformed
     */
    public function seekXY($index)
    {
        $parts = explode(self::XY_SEPARATOR, $index);
        if (false==strpos($index, self::XY_SEPARATOR) || count($parts)>2) {
            throw new InvalidArgumentException(
                sprintf("Cell index of a matrix must be set as 'x%sy'", self::XY_SEPARATOR)
            );
        }
        try {
            $this->seekX($parts[0]);
            $this->seekY($parts[1]);
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Go to index `x,y` represented as an integer (0 based)
     *
     * @param   int     $index
     * @return  $this
     * @throws  InvalidArgumentException if the argument is not an integer
     * @throws  OutOfRangeException if the integer is out of matrix's range
     */
    public function seekInt($index)
    {
        if (!is_integer($index)) {
            throw new InvalidArgumentException(
                sprintf("Cell index of a matrix for integer access must be an integer (%s given)", gettype($index))
            );
        }
        $line = $this->keyX();
        $cell = $this->keyY();
        $_index = $index + 1;
        if ($_index==1) {
            $line = 1;
            $cell = 1;
        } elseif ($_index==$this->countXY()) {
            $line = $this->countX();
            $cell = $this->countY();
        } elseif ($_index>0 && $_index<$this->countXY()) {
            if ($_index>$this->countX()) {
                $line = round(($index / $this->countX()), 0, PHP_ROUND_HALF_EVEN);
            } else {
                $line = 1;
            }
            $cell = $_index - (($line - 1) * $this->countY());
            if ($cell==($this->countY()+1)) {
                $line++;
                $cell = 1;
            }
        } else {
            throw new OutOfRangeException(
                "Index '{$index}' (as integer) is out of range of available data"
            );
        }
        $this->seekXY($line.self::XY_SEPARATOR.$cell);
        return $this;
    }

    /**
     * Get current value according to matrix's flag value
     *
     * @return  mixed|null
     * @see     self::currentX()
     * @see     self::currentY()
     * @see     self::currentXY()
     */
    public function current()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->currentX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->currentY();
        } else {
            return $this->currentXY();
        }
    }

    /**
     * Get current `x` value (line)
     *
     * @return array|null
     */
    public function currentX()
    {
        return ($this->validX() ? $this->data[$this->keyX(true)] : null);
    }

    /**
     * Get current `y` value (column)
     *
     * @return array|null
     */
    public function currentY()
    {
        $col = array();
        foreach ($this->data as $x=>$items) {
            $col[$x] = (isset($items[$this->keyY(true)]) ? $items[$this->keyY(true)] : null);
        }
        return $col;
    }

    /**
     * Get current `x:y` value (cell)
     *
     * @return mixed|null
     */
    public function currentXY()
    {
        return ($this->validXY() ? $this->data[$this->keyX(true)][$this->keyY(true)] : null);
    }

    /**
     * Get current index according to matrix's flag value
     *
     * @return  string|null
     * @see     self::keyX()
     * @see     self::keyY()
     * @see     self::keyXY()
     */
    public function key()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->keyX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->keyY();
        } else {
            return $this->keyXY();
        }
    }

    /**
     * Get current `x` index (line)
     *
     * @param   bool    $integer    Return an integer index (0 based) or a positional one (1 based)
     * @return  int|null
     */
    public function keyX($integer = false)
    {
        return ($integer==true ? ($this->x -1) : $this->x);
    }

    /**
     * Get current `y` index (column)
     *
     * @param   bool    $integer    Return an integer index (0 based) or a positional one (1 based)
     * @return  int|null
     */
    public function keyY($integer = false)
    {
        return ($integer==true ? ($this->y -1) : $this->y);
    }

    /**
     * Get current `x,y` index (cell)
     *
     * @param   bool    $integer    Return an integer index (0 based) or a positional one (1 based)
     * @return  string|null
     */
    public function keyXY($integer = false)
    {
        if ($integer==true) {
            return $this->keyInt();
        }
        return $this->x.self::XY_SEPARATOR.$this->y;
    }

    /**
     * Get current `x,y` index as an integer (0 based)
     *
     * @return  int
     */
    public function keyInt()
    {
        return ((($this->keyX() - 1) * $this->countY()) + $this->keyY() - 1);
    }

    /**
     * Test if current value is valid according to matrix's flag value
     *
     * @return  bool
     * @see     self::validX()
     * @see     self::validY()
     * @see     self::validXY()
     */
    public function valid()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->validX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->validY();
        } else {
            return $this->validXY();
        }
    }

    /**
     * Test if current `x` line is valid
     *
     * @return  bool
     */
    public function validX()
    {
        return (bool) (!is_null($this->keyX()) && isset($this->data[$this->keyX(true)]));
    }

    /**
     * Test if current `y` column is valid
     *
     * @return  bool
     */
    public function validY()
    {
        return (bool) ($this->validX() && !is_null($this->keyY()) && isset($this->data[$this->keyX(true)][$this->keyY(true)]));
    }

    /**
     * Test if current `x:y` cell is valid
     *
     * @return  bool
     */
    public function validXY()
    {
        return (bool) ($this->validX() && $this->validY());
    }

// Countable Interface

    /**
     * Count the number of values according to matrix's flag value
     *
     * @return  int
     * @see     self::countX()
     * @see     self::countY()
     * @see     self::countXY()
     */
    public function count()
    {
        if ($this->getWalkFlag() & self::WALK_X) {
            return $this->countX();
        } elseif ($this->getWalkFlag() & self::WALK_Y) {
            return $this->countY();
        } else {
            return $this->countXY();
        }
    }

    /**
     * Count the number of lines
     *
     * @return  int
     */
    public function countX()
    {
        return count($this->currentY());
    }

    /**
     * Count the number of columns
     *
     * @return  int
     */
    public function countY()
    {
        return count($this->currentX());
    }

    /**
     * Count the number of cells
     *
     * @return  int
     */
    public function countXY()
    {
        return ($this->countX() * $this->countY());
    }

// ArrayAccess Interface

    /**
     * Seek `x` and `y` to an offset
     *
     * @param   int/string   $offset
     * @return  $this
     * @throws  OutOfRangeException if the offset is out of range of matrix's indexes
     */
    public function seekToOffset($offset)
    {
        try {
            if (($this->getArrayFlag() & self::ARRAY_INT) && !is_string($offset)) {
                return $this->seekToOffsetInteger($offset);
            } else {
                return $this->seekToOffsetPositional($offset);
            }
        } catch (OutOfRangeException $e) {
            throw $e;
        }
    }

    /**
     * Seek `x` and `y` to an integer offset
     * 
     * @param   int   $offset
     * @return  $this
     * @throws  OutOfRangeException if the offset is out of range of matrix's indexes
     */
    public function seekToOffsetInteger($offset)
    {
        $indexes = explode(self::XY_SEPARATOR, $offset);
        try {
            if (count($indexes)==2) {
                if ($indexes[0]=='') {
                    $this->seekY($indexes[1]);
                } else {
                    $this->seekXY($offset);
                }
            } else {
                $this->seekX($offset);
            }
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Seek `x` and `y` to a positional offset
     *
     * Offsets can be written as:
     *
     * -    `int` to set a `x` index
     * -    `,int` to set an `y` index
     * -    `int,int` to set a `x,y` index
     *
     * @param   int/string   $offset
     * @return  $this
     * @throws  OutOfRangeException if the offset is out of range of matrix's indexes
     */
    public function seekToOffsetPositional($offset)
    {
        $indexes = explode(self::XY_SEPARATOR, $offset);
        try {
            if (count($indexes)==2) {
                if ($indexes[0]=='') {
                    $this->seekY($indexes[1]);
                } else {
                    $this->seekXY($offset);
                }
            } else {
                $this->seekX($offset);
            }
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * Test if an offset exists
     *
     * @param   int/string   $offset
     * @return  bool
     */
    public function offsetExists($offset)
    {
        try {
            $res = $this
                ->seekToOffset($offset)
                ->valid();
        } catch (OutOfRangeException $e) {
            $res = false;
        }
        return (bool) $res;
    }

    /**
     * Get an offset value
     *
     * @param   int/string   $offset
     * @return  mixed
     * @throws  Triggers a NOTICE message if the offset is out of range
     */
    public function offsetGet($offset)
    {
        try {
            $res = $this
                ->seekToOffset($offset)
                ->current();
        } catch (OutOfRangeException $e) {
            $res = null;
            trigger_error("Undefined offset: '$offset'", E_USER_NOTICE);
        }
        return $res;
    }

    /**
     * Set an offset value
     *
     * @param   int/string   $offset
     * @param   mixed       $value
     * @return  $this
     * @throws  Triggers a NOTICE message if the offset is out of range
     */
    public function offsetSet($offset, $value)
    {
        try {
            $this
                ->seekToOffset($offset)
                ->setInt($this->keyInt(), $value);
        } catch (OutOfRangeException $e) {
            trigger_error("Undefined offset: '$offset'", E_USER_NOTICE);
        }
        return $this;
    }

    /**
     * Unset an offset value (replacing it by '0')
     *
     * @param   int/string   $offset
     * @return  $this
     * @throws  Triggers a NOTICE message if the offset is out of range
     */
    public function offsetUnset($offset)
    {
        try {
            $this
                ->seekToOffset($offset)
                ->setInt($this->keyInt(), $this->getEmptyCell());
        } catch (OutOfRangeException $e) {
            trigger_error("Undefined offset: '$offset'", E_USER_NOTICE);
        }
        return $this;
    }

// Serializable Interface

    /**
     * Serialize a matrix: only `$data`, `$_cache` and `$flag` are stored
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
            'data'          =>$this->getData(),
            '_cache'        =>$this->_cache,
            '_walk_flag'     =>$this->getWalkFlag(),
            '_array_flag'    =>$this->getArrayFlag()
        ));
    }

    /**
     * Populate a matrix from a serialized array: only `$data`, `$_cache` and `$flag` are populated
     *
     * @param   string  $serialized
     * @return  void
     */
    public function unserialize($serialized)
    {
        $obj = unserialize($serialized);
        $this->data = $obj['data'];
        $this->_cache = $obj['_cache'];
        $this->setWalkFlag($obj['_walk_flag']);
        $this->setArrayFlag($obj['_array_flag']);
    }

// Lines & Columns

    /**
     * Get a line value (specifying an optional index)
     *
     * @param   int    $index
     * @return  array|null
     * @throws  OutOfRangeException
     */
    public function getLine($index = null)
    {
        if (is_null($index)) $index = $this->keyX();
        try {
            $this->seekX($index);
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this->currentX();
    }

    /**
     * Get a column value (specifying an optional index)
     *
     * @param   int    $index
     * @return  array|null
     * @throws  OutOfRangeException
     */
    public function getColumn($index = null)
    {
        if (is_null($index)) $index = $this->keyY();
        try {
            $this->seekY($index);
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this->currentY();
    }

    /**
     * Get a cell value (specifying an optional index)
     *
     * @param   string    $index
     * @return  mixed|null
     * @throws  OutOfRangeException
     * @throws  InvalidArgumentException
     */
    public function getCell($index = null)
    {
        if (is_null($index)) $index = $this->keyXY();
        try {
            $this->seekXY($index);
        } catch (InvalidArgumentException $e) {
            throw $e;
        } catch (OutOfRangeException $e) {
            throw $e;
        }
        return $this->current();
    }

// Specials

    /**
     * Test if a matrix is a square (number of lines = number of columns)
     *
     * @return bool
     */
    public function isSquareMatrix()
    {
        return (bool) ($this->countX()===$this->countY());
    }

    /**
     * Test if a matrix is a row vector (one single line)
     *
     * @return bool
     */
    public function isRowVector()
    {
        return (bool) ($this->countX()===1);
    }

    /**
     * Test if a matrix is a column vector (one single column)
     *
     * @return bool
     */
    public function isColumnVector()
    {
        return (bool) ($this->countY()===1);
    }

// Internals

    /**
     * @param   array $line
     * @return  array
     */
    protected function _padLine(array $line)
    {
        return array_pad($line, $this->getSize('x'), $this->getEmptyCell());
    }

    /**
     * @param   array $col
     * @return  array
     */
    protected function _padColumn(array $col)
    {
        return array_pad($col, $this->getSize('y'), $this->getEmptyCell());
    }

    /**
     * Special `__toString()` with infos
     *
     * @param   string  $property   An object variable to debug: x, y, xy, line, column, cell, flag or matrix (default)
     * @param   bool    $verbose    Include some info about current matrix
     * @return  string
     */
    public function __debug($property = null, $verbose = false)
    {
        $str = '';
        switch ($property) {
            case 'x':
                if ($verbose) {
                    $str .= "current 'x' index is: ";
                }
                $str .= $this->keyX();
                break;
            case 'y':
                if ($verbose) {
                    $str .= "current 'y' index is: ";
                }
                $str .= $this->keyY();
                break;
            case 'xy':
                if ($verbose) {
                    $str .= "current 'xy' index is: ";
                }
                $str .= $this->keyXY();
                break;
            case 'line':
                if ($verbose) {
                    $str .= "current line is: ";
                }
                $str .= $this->currentX();
                break;
            case 'column':
                if ($verbose) {
                    $str .= "current column is: ";
                }
                $str .= $this->currentY();
                break;
            case 'cell':
                if ($verbose) {
                    $str .= "current cell is: ";
                }
                $str .= $this->currentXY();
                break;
            case '_walk_flag':
                if ($verbose) {
                    $str .= "current walking flag is: "
                        .$this->getWalkFlag()
                        .' ('.( ($this->getWalkFlag() & self::WALK_X) ? 'X' : (($this->getWalkFlag() & self::WALK_Y) ? 'Y' : 'XY') ).')';
                } else {
                    $str .= $this->getWalkFlag();
                }
                break;
            case '_array_flag':
                if ($verbose) {
                    $str .= "current array access flag is: "
                        .$this->getArrayFlag()
                        .' ('.( ( ($this->getArrayFlag() & self::ARRAY_INT) ? 'INT' : 'XY' ) ).')';
                } else {
                    $str .= $this->getArrayFlag();
                }
                break;
            case 'matrix': default:
            if ($verbose) {
                $str .= "matrix of {$this->countX()} lines & {$this->countY()} columns"
                    ." ({$this->countXY()} cells)"
                    .PHP_EOL."walking flag is ".( ($this->getWalkFlag() & self::WALK_X) ? 'X' : (($this->getWalkFlag() & self::WALK_Y) ? 'Y' : 'XY') )
                    .PHP_EOL."array access flag is ".( ($this->getArrayFlag() & self::ARRAY_INT) ? 'INT' : 'XY' )
                    .PHP_EOL."----------------".PHP_EOL;
            }
            foreach ($this->data as $x=>$cell) {
                foreach ($cell as $y=>$val) {
                    $str .= '['.($x+1).self::XY_SEPARATOR.($y+1).']'.$val.' ';
                }
                $str .= PHP_EOL;
            }
            break;
        }
        return $str;
    }

}

// Endfile
