<?php

$jxg = new \Maths\Helper\JSXgraph($BOXID, array(
    'board_boundingbox'     => array(-1.5,1.5,1.5,-1.5),
    'draw_origin'           => false,
));

$origin = new \Maths\Geometry\Point(0,0);
$circ = new \Maths\Geometry\Circle($origin, 1);
$jxg->drawCircle($circ);

$pi = new Maths\Point2D(-1,0);
$jxg->drawPoint($pi, array('name'=>'PI', 'color'=>'#00ff00'));
$halfpi = new Maths\Point2D(0,1);
$jxg->drawPoint($halfpi, array('name'=>'half PI', 'color'=>'#00ff00'));
$onehalfpi = new Maths\Point2D(0,-1);
$jxg->drawPoint($onehalfpi, array('name'=>'one and a half PI', 'color'=>'#00ff00'));

$pi = new Maths\Point2D(0.5,$circ->getOrdinateByAbscissa(0.5));
$jxg->drawPoint($pi, array('name'=>'alpha', 'color'=>'#ff0000'));

echo $jxg;
