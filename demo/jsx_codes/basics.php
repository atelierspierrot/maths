<?php

$jxg = new \Maths\Helper\JSXgraph($BOXID, array(
    'board_boundingbox' => array(-5, 10, 5, -2),
));

$js_point1d = new Maths\Point1D(2);
$jxg->drawHorizontalPoint($js_point1d);

$js_point2d = new Maths\Point2D(-1, 3);
$jxg->drawPoint($js_point2d);

$js_point2d_vertical = new Maths\Point2D(2, -1);
$jxg->drawVerticalPoint($js_point2d_vertical);

$a = new Maths\Geometry\Point(-2.5, 5);
$b = new Maths\Geometry\Point(4, 4);
$js_line1 = new Maths\Geometry\Segment($a, $b);
$jxg->drawSegment($js_line1, array('build_segment_ghost'=>false));

echo $jxg;
