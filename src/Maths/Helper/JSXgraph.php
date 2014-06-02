<?php
/**
 * PHP Library package of Les Ateliers Pierrot
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/library>
 */

namespace Maths\Helper;

use \Maths\PointInterface;
use \Maths\Geometry\Point;
use \Maths\Geometry\Line;
use \Maths\Geometry\Segment;

/**
 * Helper class to use the JSXgraph javascript library to render mathematics forms
 *
 * @see     http://jsxgraph.uni-bayreuth.de/
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class JSXgraph
{

    const ORIGIN_PREFIX     = 'origin_';
    const BOARD_PREFIX      = 'board_';
    const SEGMENT_PREFIX    = 'segment_';
    const GHOST_LINE_PREFIX = 'ghostline_';

    public $output;

    protected $_options = array(
        // global board
        'draw_board'            => true,
        'board_boundingbox'     => array(-10,10,10,-10),
        'board_axis'            => true,
        'board_width'           => 500,
        'board_height'          => 500,
        // origin point
        'origin_color'          => '#404040',
        'origin_face'           => '[]',
        // straight segment
        'segment_straightFirst' => false,
        'segment_straightLast'  => false,
        'segment_strokeWidth'   => 2,
        // segment associated line
        'ghostline_strokeWidth' => 1,
        'ghostline_dash'        => 2,
    );

    protected $_points = array();

    protected $_brd;

    public function __construct($id, array $options = array())
    {
        $this
            ->setOptions($options)
            ->resetOutput()
            ->init($id)
            ;
    }

    public function __toString()
    {
        return $this->getOutput();
    }

// Setters / Getters

    public function setOptions(array $options)
    {
        $this->_options = array_merge($this->_options, $options);
        return $this;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function getOptionsByPrefix($prefix)
    {
        $opts = array();
        foreach ($this->_options as $n=>$v) {
           if (substr($n, 0, strlen($prefix))==$prefix) {
               $opts[substr($n, strlen($prefix))] = $v;
           }
        }
        return $opts;
    }

    public function getOption($index, $default = null)
    {
        return (isset($this->_options[$index]) ? $this->_options[$index] : $default);
    }

    public function resetOutput()
    {
        $this->output = '';
        return $this;
    }

    public function addOutput($str)
    {
        $this->output .= $str.PHP_EOL;
        return $this;
    }

    public function getOutput($reset = true)
    {
        $str = $this->output;
        if (true==$reset) {
            $this->resetOutput();
        }
        return $str;
    }

// Drawings

    public function init($id)
    {
        $this->_brd_id = $id;
        if ($this->getOption('draw_board', false)==true) {
            $this->drawBoard($id);
        }
        $this->drawOrigin();
    }

    public function drawBoard($id, array $options = array())
    {
        $options = array_merge(
            $this->getOptionsByPrefix(self::BOARD_PREFIX), $options
        );
        $data = json_encode($options, JSON_NUMERIC_CHECK);
        $this->_brd = 'brd'.uniqid();
        $this->addOutput(
            "var {$this->_brd} = JXG.JSXGraph.initBoard('{$id}', {$data});"
        );
        return $this->_brd;
    }

    public function drawPoint(PointInterface $point, array $options = array())
    {
        $this->_points[] = array(
            'object'=>$point,
            'options'=>$options
        );
        if (array_key_exists('x', $options)) {
            $x = $options['x'];
            unset($options['x']);
        } else {
            $x = $point->getAbscissa();
        }
        if (array_key_exists('y', $options)) {
            $y = $options['y'];
            unset($options['y']);
        } else {
            $y = $point->getOrdinate();
        }
        if (array_key_exists('prefix', $options)) {
            $p = $options['prefix'];
            unset($options['prefix']);
        } else {
            $p = 'p';
        }
        $data = json_encode($options, JSON_NUMERIC_CHECK);
        $name = $p.count($this->_points);
        $this->addOutput(
            "var {$name} = {$this->_brd}.create('point', [{$x},{$y}], {$data});"
        );
        return $name;
    }

    public function drawOrigin(array $options = array())
    {
        $origin = new Point(0,0);
        $options = array_merge(
            $this->getOptionsByPrefix(self::ORIGIN_PREFIX), $options
        );
        return $this->drawPoint($origin, $options);
    }

    public function drawHorizontalPoint(PointInterface $point, array $options = array())
    {
        return $this->drawPoint($point, array_merge($options, array('y'=>'function(){return o.Y();}')));
    }

    public function drawVerticalPoint(PointInterface $point, array $options = array())
    {
        return $this->drawPoint($point, array_merge($options, array('x'=>'function(){return o.X();}')));
    }

    public function drawSegment(Line $line, array $options = array())
    {
        $point1 = $this->drawPoint($line->getPointA(), $options);
        $point2 = $this->drawPoint($line->getPointB(), $options);
        $data_segment = json_encode(
            array_merge($options, $this->getOptionsByPrefix(self::SEGMENT_PREFIX)),
            JSON_NUMERIC_CHECK
        );
        $name_segment = 'l'.uniqid();
        $data_ghostline = json_encode(
            array_merge($options, $this->getOptionsByPrefix(self::GHOST_LINE_PREFIX)),
            JSON_NUMERIC_CHECK
        );
        $name_ghostline = 'gl'.uniqid();
        $this->addOutput(
            "var {$name_ghostline} = {$this->_brd}.create('line', [{$point1},{$point2}], {$data_ghostline});"
            .PHP_EOL.
            "var {$name_segment} = {$this->_brd}.create('line', [{$point1},{$point2}], {$data_segment});"
        );
        return $name_segment;
    }

}

// Endfile
