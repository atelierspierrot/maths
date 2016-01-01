<?php

$jxg = new \Maths\Helper\JSXgraph($BOXID, array(
    'board_boundingbox'     => array(-5, 10, 5, -2),
));

// Thales-inverse to demonstrate that [A->B] and [C->D] are parallels
$seg_para_a = new \Maths\Geometry\Point(-1, 2);
$seg_para_b = new \Maths\Geometry\Point(1, 4);
$seg_para_1 = new \Maths\Geometry\Segment($seg_para_a, $seg_para_b);
$jxg->drawSegment($seg_para_1);

$seg_para_c = new \Maths\Geometry\Point(-2.5, 2.5);
$seg_para_d = new \Maths\Geometry\Point(2, 7);
$seg_para_2 = new \Maths\Geometry\Segment($seg_para_c, $seg_para_d);
$jxg->drawSegment($seg_para_2);

$seg_para_e = new \Maths\Geometry\Point(1, -1);
$seg_para_f = new \Maths\Geometry\Point(3, 2);
$seg_para_3 = new \Maths\Geometry\Segment($seg_para_e, $seg_para_f);
$jxg->drawSegment($seg_para_3);

$seg_para_1->rearrange();
$seg_para_2->rearrange();
$abs = array(
    $seg_para_1->getPointA()->getAbscissa(),
    $seg_para_1->getPointB()->getAbscissa(),
    $seg_para_2->getPointA()->getAbscissa(),
    $seg_para_2->getPointB()->getAbscissa()
);
$ords = array(
    $seg_para_1->getPointA()->getOrdinate(),
    $seg_para_1->getPointB()->getOrdinate(),
    $seg_para_2->getPointA()->getOrdinate(),
    $seg_para_2->getPointB()->getOrdinate()
);
$e = new \Maths\Geometry\Point(
    (max($abs) + abs(min($abs)) - 2),
    (max($ords) + abs(min($ords)) - 6)
);
$jxg->drawPoint($e, array('color'=>'#00ff00'));
$segAE = new \Maths\Geometry\Segment($seg_para_1->getPointA(), $e);
$segBE = new \Maths\Geometry\Segment($seg_para_1->getPointB(), $e);

$intersectCE = \Maths\Maths::getLinesIntersection($segAE, $seg_para_2);
$segCE = new \Maths\Geometry\Segment($intersectCE, $e);
$intersectDE = \Maths\Maths::getLinesIntersection($segBE, $seg_para_2);
$segDE = new \Maths\Geometry\Segment($intersectDE, $e);
$jxg->drawSegment($segAE, array('color'=>'#00ff00'));
$jxg->drawSegment($segBE, array('color'=>'#00ff00'));

/*
$ok = \Maths\Maths::areParallels($seg_para_1, $seg_para_2);
$ok = \Maths\Maths::areParallels($seg_para_1, $seg_para_3);
*/
echo $jxg;
