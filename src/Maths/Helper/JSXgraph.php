<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths\Helper;

use \Maths\PointInterface;
use \Maths\Geometry\Point;
use \Maths\Geometry\Line;
use \Maths\Geometry\Segment;
use \Maths\Geometry\Quadrilateral;
use \Maths\Geometry\Circle;

/**
 * Helper class to use the JSXgraph javascript library to render mathematics forms
 *
 * @see     http://jsxgraph.uni-bayreuth.de/
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
class JSXgraph
{

    const ORIGIN_NAME       = 'origin';
    const ORIGIN_PREFIX     = 'origin_';
    const BOARD_PREFIX      = 'board_';
    const SEGMENT_PREFIX    = 'segment_';
    const GHOST_LINE_PREFIX = 'ghostline_';
    const POLYGONE_PREFIX   = 'polygon_';
    const CIRCLE_PREFIX     = 'circle_';
    const CIRCLE_POINT_PREFIX = 'circle_point_';

    public $output;

    protected $_options = array(
        // global board
        'draw_board'            => true,
        'board_boundingbox'     => array(-10,10,10,-10),
        'board_axis'            => true,
        'board_width'           => 500,
        'board_height'          => 500,
        // origin point
        'origin_name'           => 'O',
        'origin_color'          => '#404040',
        'origin_face'           => '[]',
        // circle
        'circle_strokeWidth'    => 2,
        'circle_fillColor'      => "#ffff00",
        'circle_fillOpacity'    => 0.3,
        // circle point
        'circle_point_color'    => '#404040',
        'circle_point_face'     => '+',
        // straight segment
        'segment_straightFirst' => false,
        'segment_straightLast'  => false,
        'segment_strokeWidth'   => 2,
        // segment associated line
        'ghostline_strokeWidth' => 1,
        'ghostline_dash'        => 2,
        // presets
        'build_polygon_group'   => true,
        'build_segment_ghost'   => true,
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

    public function addPoint($name, PointInterface $point, array $options = array(), $alt_name = null, $overload = false)
    {
        if (!array_key_exists($name, $this->_points) || $overload==true) {
            $this->_points[$name] = array(
                'name'  =>(!is_null($alt_name) ? $alt_name : $name),
                'point' =>$point,
                'data'  =>$options
            );
        }
    }

    public function getPoint($name)
    {
        return (array_key_exists($name, $this->_points) ? $this->_points[$name] : null);
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
        $this->addPoint($name, $point, $options);
        return $name;
    }

    public function drawOrigin(array $options = array())
    {
        $origin = new Point(0,0);
        $options = array_merge(
            $this->getOptionsByPrefix(self::ORIGIN_PREFIX), $options
        );
        $name = $this->drawPoint($origin, $options);
        $this->addPoint(self::ORIGIN_NAME, $origin, $options, $name);
        return self::ORIGIN_NAME;
    }

    public function drawHorizontalPoint(PointInterface $point, array $options = array())
    {
        $o = $this->getPoint(self::ORIGIN_NAME);
        return $this->drawPoint($point, array_merge($options, array('y'=>"function(){return {$o['name']}.Y();}")));
    }

    public function drawVerticalPoint(PointInterface $point, array $options = array())
    {
        $o = $this->getPoint(self::ORIGIN_NAME);
        return $this->drawPoint($point, array_merge($options, array('x'=>"function(){return {$o['name']}.X();}")));
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
        if ($this->getOption('build_segment_ghost')==true && (!array_key_exists('build_segment_ghost', $options) || $options['build_segment_ghost']==true)) {
            $this->addOutput(
                "var {$name_ghostline} = {$this->_brd}.create('line', [{$point1},{$point2}], {$data_ghostline});"
            );
        }
        $this->addOutput(
            "var {$name_segment} = {$this->_brd}.create('line', [{$point1},{$point2}], {$data_segment});"
        );
        return $name_segment;
    }

    public function drawQuadrilateral(Quadrilateral $quadri, array $options = array())
    {
        $point1 = $this->drawPoint($quadri->getPointA(), $options);
        $point2 = $this->drawPoint($quadri->getPointB(), $options);
        $point3 = $this->drawPoint($quadri->getPointC(), $options);
        $point4 = $this->drawPoint($quadri->getPointD(), $options);
        $data = json_encode(
            array_merge($options, $this->getOptionsByPrefix(self::POLYGONE_PREFIX)),
            JSON_NUMERIC_CHECK
        );
        $name_quadri = 'pol'.uniqid();
        $this->addOutput(
            "var {$name_quadri} = {$this->_brd}.create('polygon', [{$point1},{$point2},{$point3},{$point4}], {$data});"
        );
        if ($this->getOption('build_polygon_group')==true && (!array_key_exists('build_polygon_group', $options) || $options['build_polygon_group']==true)) {
            $this->addOutput(
                "var gr{$name_quadri} = {$this->_brd}.create('group', [{$point1},{$point2},{$point3},{$point4}]);"
            );
        }
        return $name_quadri;
    }

    public function drawCircle(Circle $circ, array $options = array())
    {
        $pointO = $this->drawPoint($circ->getPointO(), $options);
        $tmp_point1 = new Point(($circ->getPointO()->getAbscissa() + $circ->getRadius()), $circ->getPointO()->getOrdinate());
        $point1 = $this->drawPoint($tmp_point1, array_merge($options, $this->getOptionsByPrefix(self::CIRCLE_POINT_PREFIX)));
        $data = json_encode(
            array_merge($options, $this->getOptionsByPrefix(self::CIRCLE_PREFIX)),
            JSON_NUMERIC_CHECK
        );
        $name_circle = 'circ'.uniqid();
        $this->addOutput(
            "var {$name_circle} = {$this->_brd}.create('circle', [{$pointO},{$point1}], {$data});"
        );
        return $name_circle;
    }

// Specials

    public function demonstrateThales(Line $line1, Line $line2)
    {

    }

}

// Endfile
