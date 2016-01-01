<?php

$jxg = new \Maths\Helper\JSXgraph($BOXID);

// used by representation below
$js_point1d = new Maths\Point1D(2);
$jxg->drawHorizontalPoint($js_point1d);

$js_point2d = new Maths\Point2D(-1, 3);
$jxg->drawPoint($js_point2d);

$a = new Maths\Geometry\Point(-2.5, 5);
$b = new Maths\Geometry\Point(4, 4);
$js_line1 = new Maths\Geometry\Segment($a, $b);
$jxg->drawSegment($js_line1);

$r1 = new Maths\Geometry\Point(-2, -5);
$r2 = new Maths\Geometry\Point(2, -4);
$r3 = new Maths\Geometry\Point(2, -6);
$r4 = new Maths\Geometry\Point(-2, -7);
$quadri = new \Maths\Geometry\Quadrilateral($r1, $r2, $r3, $r4);
$jxg->drawQuadrilateral($quadri);

$origin = new \Maths\Geometry\Point(-1, -2);
$circ = new \Maths\Geometry\Circle($origin, 3);
$jxg->drawCircle($circ);

echo $jxg;
