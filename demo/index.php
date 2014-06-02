<?php

/**
 * Show errors at least initially
 *
 * `E_ALL` => for hard dev
 * `E_ALL & ~E_STRICT` => for hard dev in PHP5.4 avoiding strict warnings
 * `E_ALL & ~E_NOTICE & ~E_STRICT` => classic setting
 */
//@ini_set('display_errors','1'); @error_reporting(E_ALL);
//@ini_set('display_errors','1'); @error_reporting(E_ALL & ~E_STRICT);
@ini_set('display_errors','1'); @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

/**
 * Set a default timezone to avoid PHP5 warnings
 */
$dtmz = @date_default_timezone_get();
date_default_timezone_set($dtmz?:'Europe/Paris');

/**
 * For security, transform a realpath as '/[***]/package_root/...'
 *
 * @param string $path
 * @param int $depth_from_root
 *
 * @return string
 */
function _getSecuredRealPath($path, $depth_from_root = 1)
{
    $ds = DIRECTORY_SEPARATOR;
    $parts = explode($ds, realpath('.'));
    for ($i=0; $i<=$depth_from_root; $i++) array_pop($parts);
    return str_replace(join($ds, $parts), $ds.'[***]', $path);
}

function getPhpClassManualLink( $class_name, $ln='en' )
{
    return sprintf('http://php.net/manual/%s/class.%s.php', $ln, strtolower($class_name));
}

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Test & documentation of PHP "Maths" package</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="assets/html5boilerplate/css/normalize.css" />
    <link rel="stylesheet" href="assets/html5boilerplate/css/main.css" />
    <script src="assets/html5boilerplate/js/vendor/modernizr-2.6.2.min.js"></script>
	<link rel="stylesheet" href="assets/styles.css" />

    <script src="assets/jsxgraph/jsxgraphcore.js"></script>
    <link rel="stylesheet" href="assets/jsxgraph/jsxgraph.css" />

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <header id="top" role="banner">
        <hgroup>
            <h1>Tests of PHP <em>Maths</em> package</h1>
            <h2 class="slogan">Some PHP classes to do mathematics.</h2>
        </hgroup>
        <div class="hat">
            <p>These pages show and demonstrate the use and functionality of the <a href="https://github.com/atelierspierrot/maths">atelierspierrot/maths</a> PHP package you just downloaded.</p>
        </div>
    </header>

	<nav>
		<h2>Map of the package</h2>
        <ul id="navigation_menu" class="menu" role="navigation">
            <li><a href="index.php">Homepage</a><ul>
                    
            </ul></li>
        </ul>

        <div class="info">
            <p><a href="https://github.com/atelierspierrot/maths">See online on GitHub</a></p>
            <p class="comment">The sources of this plugin are hosted on <a href="http://github.com">GitHub</a>. To follow sources updates, report a bug or read opened bug tickets and any other information, please see the GitHub website above.</p>
        </div>

    	<p class="credits" id="user_agent"></p>
	</nav>

    <div id="content" role="main">

        <article>

	<h2 id="tests">Tests & documentation</h2>

<?php
if (file_exists($_f = __DIR__."/../vendor/autoload.php")) {
    require_once $_f;
} else {
    trigger_error('You need to run Composer on your package to install dependencies!', E_USER_ERROR);
}
?>
    
<h3 id="maths">\Maths</h3>

    <p>This namespace defines objects to work with geometric objects in 1, 2 or 3 dimensional spaces. By convention, the coordinates of the objects are called <code>( abscissa , ordinate , applicate )</code>, but your can access each of them using the following shortcuts:</p>
    <ul>
        <li>the <em>abscissa</em> coordinate can be accessed with index <code>0</code> or <code>x</code> (case insensitive)</li>
        <li>the <em>ordinate</em> coordinate can be accessed with index <code>1</code> or <code>y</code> (case insensitive)</li>
        <li>the <em>applicate</em> coordinate can be accessed with index <code>2</code> or <code>z</code> (case insensitive)</li>
    </ul>
    <p>Each of these coordinates can be accessed directly like <code>$obj->name</code> or by array access like <code>$obj[name]</code>.</p>

    <h4 id="points">Library\Maths\Point(s)</h4>

    <pre class="code" data-language="php">
<?php

$point1d = new Maths\Point1D(5);
echo '$point1d = new Maths\Point1D(5);'."\n";
echo 'echo $point1d->is1D()'."\n";
echo var_export($point1d->is1D(),1)."\n";
echo 'echo $point1d->is2D()'."\n";
echo var_export($point1d->is2D(),1)."\n";
echo 'echo $point1d->is3D()'."\n";
echo var_export($point1d->is3D(),1)."\n";
echo 'echo $point1d'."\n";
echo $point1d."\n";
echo '$point1d->x = 1;'."\n";
$point1d->x = 1;
echo $point1d."\n";
echo '$point1d->abscissa = 2;'."\n";
$point1d->abscissa = 2;
echo $point1d."\n";
echo '$point1d[0] = 3;'."\n";
$point1d[0] = 3;
echo $point1d."\n";
echo '$point1d->setAbscissa(-6);'."\n";
$point1d->setAbscissa(-6);
echo $point1d."\n";
echo '$point1d->getAbscissa();'."\n";
echo $point1d->getAbscissa()."\n";

echo "\n";
$point2d = new Maths\Point2D(3,6);
echo '$point2d = new Maths\Point2D(3,6);'."\n";
echo $point2d."\n";
echo 'echo $point2d->is1D()'."\n";
echo var_export($point2d->is1D(),1)."\n";
echo 'echo $point2d->is2D()'."\n";
echo var_export($point2d->is2D(),1)."\n";
echo 'echo $point2d->is3D()'."\n";
echo var_export($point2d->is3D(),1)."\n";
echo 'echo $point2d'."\n";
echo $point2d."\n";
echo '$point2d->x = 1;'."\n";
echo '$point2d->y = 4;'."\n";
$point2d->x = 1;
$point2d->y = 4;
echo $point2d."\n";
echo '$point2d->abscissa = 2;'."\n";
echo '$point2d->ordinate = 1;'."\n";
$point2d->abscissa = 2;
$point2d->ordinate = 1;
echo $point2d."\n";
echo '$point2d[0] = 3;'."\n";
echo '$point2d[1] = -1;'."\n";
$point2d[0] = 3;
$point2d[1] = -1;
echo $point2d."\n";
echo '$point2d->setAbscissa(-6);'."\n";
echo '$point2d->setOrdinate(-2);'."\n";
$point2d->setAbscissa(-6);
$point2d->setOrdinate(-2);
echo $point2d."\n";
echo '$point2d->getAbscissa();'."\n";
echo $point2d->getAbscissa()."\n";
echo '$point2d->getOrdinate();'."\n";
echo $point2d->getOrdinate()."\n";

$point2d->name = 'D';
var_export($point2d);

echo "\n";
$point3d = new Maths\Point3D(2,4,8);
echo '$point3d = new Maths\Point3D(2,4,8);'."\n";
echo $point3d."\n";
echo 'echo $point3d->is1D()'."\n";
echo var_export($point3d->is1D(),1)."\n";
echo 'echo $point3d->is2D()'."\n";
echo var_export($point3d->is2D(),1)."\n";
echo 'echo $point3d->is3D()'."\n";
echo var_export($point3d->is3D(),1)."\n";
echo 'echo $point3d'."\n";
echo $point3d."\n";
echo '$point3d->x = 1;'."\n";
echo '$point3d->y = 4;'."\n";
$point3d->x = 1;
$point3d->y = 4;
echo $point3d."\n";
echo '$point3d->abscissa = 2;'."\n";
echo '$point3d->applicate = 1;'."\n";
$point3d->abscissa = 2;
$point3d->applicate = 1;
echo $point3d."\n";
echo '$point3d[0] = 3;'."\n";
echo '$point3d[1] = -1;'."\n";
$point3d[0] = 3;
$point3d[1] = -1;
echo $point3d."\n";
echo '$point3d->setAbscissa(-6);'."\n";
echo '$point3d->setApplicate(-2);'."\n";
$point3d->setAbscissa(-6);
$point3d->setApplicate(-2);
echo $point3d."\n";
echo '$point3d->getAbscissa();'."\n";
echo $point3d->getAbscissa()."\n";
echo '$point3d->getOrdinate();'."\n";
echo $point3d->getOrdinate()."\n";

echo "\n\n";
$point_d1 = new Maths\Point2D(2,2);
$point_d2 = new Maths\Point2D(3,4);
$point_d3 = new Maths\Point2D(0,1);
echo '$point_d1 = new Maths\Point2D(2,2);'."\n";
echo '$point_d2 = new Maths\Point2D(3,4);'."\n";
echo '$point_d3 = new Maths\Point2D(0,1);'."\n";
echo 'echo \Maths\Maths::getDirectionByPoints($point_d1, $point_d2))'."\n";
echo var_export(\Maths\Maths::getDirectionByPoints($point_d1, $point_d2),1)."\n";
echo 'echo \Maths\Maths::getDirectionByPoints($point_d1, $point_d3))'."\n";
echo var_export(\Maths\Maths::getDirectionByPoints($point_d1, $point_d3),1)."\n";


?>
    </pre>

    <h4 id="points">Library\Maths\Geometry\Line and Library\Maths\Geometry\Segment</h4>

    <pre class="code" data-language="php">
<?php

echo '$line_pointa = new \Maths\Geometry\Point(2,4);'."\n";
echo '$line_pointb = new \Maths\Geometry\Point(-2,3);'."\n";
echo '$line1 = new \Maths\Geometry\Segment($line_pointa, $line_pointb);'."\n";
$line_pointa = new \Maths\Geometry\Point(2,4);
$line_pointb = new \Maths\Geometry\Point(-2,3);
$line1 = new \Maths\Geometry\Line($line_pointa, $line_pointb);
echo 'echo $line1;'."\n";
echo $line1."\n";

echo "\n\n";
$test_pointa = new \Maths\Geometry\Point(1,3.75);
$test_pointb = new \Maths\Geometry\Point(3,2);
echo '$test_pointa = new \Maths\Geometry\Point(1,3.75);'."\n";
echo '$test_pointb = new \Maths\Geometry\Point(3,2);'."\n";
echo '$line1->isValidPoint($test_pointa);'."\n";
echo var_export($line1->isValidPoint($test_pointa),1)."\n";
echo '$line1->isValidPoint($test_pointb);'."\n";
echo var_export($line1->isValidPoint($test_pointb),1)."\n";

echo "\n\n";
echo '$segment_pointa = new \Maths\Geometry\Point(2,4);'."\n";
echo '$segment_pointb = new \Maths\Geometry\Point(-2,3);'."\n";
echo '$segment1 = new \Maths\Geometry\Segment($segment_pointa, $segment_pointb);'."\n";
$segment_pointa = new \Maths\Geometry\Point(2,4);
$segment_pointb = new \Maths\Geometry\Point(-2,3);
$segment1 = new \Maths\Geometry\Segment($segment_pointa, $segment_pointb);
echo 'echo $segment1;'."\n";
echo $segment1."\n";

echo 'echo $segment1->getLength()'."\n";
echo $segment1->getLength()."\n";

$segment1->getPointA()->x = -2;
echo $segment1."\n";

echo 'echo $segment1->length'."\n";
echo $segment1->length."\n";



$seg_para_a = new \Maths\Geometry\Point(1,2);
$seg_para_b = new \Maths\Geometry\Point(1,4);
$seg_para_1 = new \Maths\Geometry\Segment($seg_para_a, $seg_para_b);
$seg_para_c = new \Maths\Geometry\Point(3,-1);
$seg_para_d = new \Maths\Geometry\Point(3,2);
$seg_para_2 = new \Maths\Geometry\Segment($seg_para_c, $seg_para_d);

var_export(\Maths\Maths::areParallels($seg_para_1, $seg_para_2));

$seg_para_e = new \Maths\Geometry\Point(1,-1);
$seg_para_f = new \Maths\Geometry\Point(3,2);
$seg_para_3 = new \Maths\Geometry\Segment($seg_para_e, $seg_para_f);
var_export(\Maths\Maths::areParallels($seg_para_1, $seg_para_3));

?>

    </pre>

    <h4 id="points">Library\Maths\Geometry\Rectangle</h4>

    <pre class="code" data-language="php">
<?php

$rec_pointA = new \Maths\Geometry\Point(1,2);
$rec_pointB = new \Maths\Geometry\Point(4,2);
$rec_pointC = new \Maths\Geometry\Point(4,4);
$rec_pointD = new \Maths\Geometry\Point(1,4);
echo '$quadri = new \Maths\Geometry\Quadrilateral($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);'."\n";
$quadri = new \Maths\Geometry\Quadrilateral($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);
echo '$rec_pointA = new \Maths\Geometry\Point(1,2);'."\n";
echo '$rec_pointB = new \Maths\Geometry\Point(1,4);'."\n";
echo '$rec_pointC = new \Maths\Geometry\Point(3,2);'."\n";
echo '$rec_pointD = new \Maths\Geometry\Point(3,4);'."\n";
echo 'echo $quadri;'."\n";
echo $quadri."\n";
//var_export($quadri);
echo 'echo $quadri->isParallelogram();'."\n";
echo var_export($quadri->isParallelogram(),1)."\n";

echo "\n\n";
echo '$rect = new \Maths\Geometry\Rectangle($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);'."\n";
$rect = new \Maths\Geometry\Rectangle($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);
echo 'echo $rect;'."\n";
echo $rect."\n";
var_export($rect);
echo 'echo $rect->width'."\n";
echo $rect->width."\n";
echo 'echo $rect->height'."\n";
echo $rect->height."\n";
echo 'echo $rect->area'."\n";
echo $rect->area."\n";
echo 'echo $rect->perimeter'."\n";
echo $rect->perimeter."\n";

echo $rect->getSegmentAB();

?>
    </pre>

    <h4 id="jsgraph">Representation</h4>

    <p>This representation uses the javascript library <a href="http://jsxgraph.uni-bayreuth.de/wp/">JSXgraph</a> under both GNU Lesser GPL and MIT licenses.</p>

<?php
// used by representation below
$js_point1d = new Maths\Point1D(2);
$js_point2d = new Maths\Point2D(-1,3);
$a = new Maths\Geometry\Point(-2.5,5);
$b = new Maths\Geometry\Point(4,4);
$js_line1 = new Maths\Geometry\Segment($a, $b);

$r1 = new Maths\Geometry\Point(-2,6);
$r2 = new Maths\Geometry\Point(2,6);
$r3 = new Maths\Geometry\Point(2,8);
$r4 = new Maths\Geometry\Point(-2,8);
?>

<div id="box" class="jxgbox" style="width:500px; height:500px;"></div>
<script type="text/javascript">
    var brd = JXG.JSXGraph.initBoard('box', {
        boundingbox:[-5,10,5,-2],
        axis:true
    });
    var o = brd.create('point', [0,0], {
        style:1,
        face: '[]',
        fixed:true,
        name: 'Origin',
        color: "#404040"
    });
    var p1 = brd.create('point', [<?php echo $js_point1d->x; ?>,function(){ return o.Y();}], {
        style:6,
        name: 'Point1D'
    });
    var p2 = brd.create('point', [<?php echo $js_point2d->x; ?>,<?php echo $js_point2d->y; ?>], {
        style:6,
        name: 'Point2D'
    });
    var a = brd.create('point', [<?php echo $a->x; ?>,<?php echo $a->y; ?>], {
        name: 'PointA',
        color: "#00ff00"
    });
    var b = brd.create('point', [<?php echo $b->x; ?>,<?php echo $b->y; ?>], {
        name: 'PointB',
        color: "#00ff00"
    });
    var li1 = brd.create('line', [a,b], {
        name: 'Segment',
        straightFirst:false,
        straightLast:false,
        strokeWidth:2
    });
    var r1 = brd.create('point', [<?php echo $r1->x; ?>,<?php echo $r1->y; ?>], {
        name: 'PointRa',
        color: "#0000ff"
    });
    var r2 = brd.create('point', [<?php echo $r2->x; ?>,<?php echo $r2->y; ?>], {
        name: 'PointRb',
        color: "#0000ff"
    });
    var r3 = brd.create('point', [<?php echo $r3->x; ?>,<?php echo $r3->y; ?>], {
        name: 'PointRc',
        color: "#0000ff"
    });
    var r4 = brd.create('point', [<?php echo $r4->x; ?>,<?php echo $r4->y; ?>], {
        name: 'PointRd',
        color: "#0000ff"
    });
    var rect = brd.createElement('polygon',[r1,r2,r3,r4]);
    var gr = brd.create('group',[r1,r2,r3,r4]);
</script>

    <h4 id="tests">Tests</h4>
    <div id="testbox" class="jxgbox" style="width:500px; height:500px;"></div>
    <script type="text/javascript">
        var brd = JXG.JSXGraph.initBoard('testbox', {
            boundingbox:[-10,20,20,-10],
            axis:true
        });
        var o = brd.create('point', [0,0], {
            style:1,
            face: '[]',
            fixed:true,
            name: 'Origin',
            color: "#404040"
        });

// Thales-inverse to demonstrate that [A->B] and [C->D] are parallels
<?php
$seg_para_a = new \Maths\Geometry\Point(-1,2);
$seg_para_b = new \Maths\Geometry\Point(1,4);
$seg_para_1 = new \Maths\Geometry\Segment($seg_para_a, $seg_para_b);

$y = 0;
$x = $seg_para_1->getAbscissaByOrdinate($y);
$seg_para_n = new \Maths\Geometry\Point($x,$y);

$seg_para_c = new \Maths\Geometry\Point(-0.5,0);
$seg_para_d = new \Maths\Geometry\Point(3,3.58);
$seg_para_2 = new \Maths\Geometry\Segment($seg_para_c, $seg_para_d);

$seg_para_e = new \Maths\Geometry\Point(1,-1);
$seg_para_f = new \Maths\Geometry\Point(3,2);
$seg_para_3 = new \Maths\Geometry\Segment($seg_para_e, $seg_para_f);

?>
        // segment AB
        var pA = brd.create('point', [<?php echo $seg_para_a->x; ?>,<?php echo $seg_para_a->y; ?>], {
            name: 'A'
        });
        var pB = brd.create('point', [<?php echo $seg_para_b->x; ?>,<?php echo $seg_para_b->y; ?>], {
            name: 'B'
        });
        var l1 = brd.create('line', [pA,pB], {
            strokeWidth:2,
            dash: 2
        });
        var s1 = brd.create('line', [pA,pB], {
            straightFirst:false,
            straightLast:false,
            strokeWidth:2
        });
        // test of line point
        var pN = brd.create('point', [<?php echo $seg_para_n->x; ?>,<?php echo $seg_para_n->y; ?>], {
            name: 'N', color: '#0000ff'
        });
        // segment CD
        var pC = brd.create('point', [<?php echo $seg_para_c->x; ?>,<?php echo $seg_para_c->y; ?>], {
            name: 'C'
        });
        var pD = brd.create('point', [<?php echo $seg_para_d->x; ?>,<?php echo $seg_para_d->y; ?>], {
            name: 'D'
        });
        var l2 = brd.create('line', [pC,pD], {
            strokeWidth:2,
            dash: 2,
            color: "#00ff00"
        });
        var s2 = brd.create('line', [pC,pD], {
            straightFirst:false,
            straightLast:false,
            strokeWidth:2,
            color: "#00ff00"
        });
        // segment EF
        var pE = brd.create('point', [<?php echo $seg_para_e->x; ?>,<?php echo $seg_para_e->y; ?>], {
            name: 'E'
        });
        var pF = brd.create('point', [<?php echo $seg_para_f->x; ?>,<?php echo $seg_para_f->y; ?>], {
            name: 'F'
        });
        var l3 = brd.create('line', [pE,pF], {
            strokeWidth:2,
            dash: 2,
            color: "#ff0000"
        });
        var s3 = brd.create('line', [pE,pF], {
            straightFirst:false,
            straightLast:false,
            strokeWidth:2,
            color: "#ff0000"
        });
<?php
$ok = \Maths\Maths::areParallels($seg_para_1, $seg_para_2);
$ok = \Maths\Maths::areParallels($seg_para_1, $seg_para_3);
?>
    </script>
<br /><br />
<div id="jxgbox" class="jxgbox" style="width:500px; height:500px;"></div>
<script type="text/javascript">
<?php

$jxg = new \Maths\Helper\JSXgraph('jxgbox');

// used by representation below
$js_point1d = new Maths\Point1D(2);
$jxg->drawHorizontalPoint($js_point1d);
$js_point2d = new Maths\Point2D(-1,3);
$jxg->drawPoint($js_point2d);
$a = new Maths\Geometry\Point(-2.5,5);
$b = new Maths\Geometry\Point(4,4);
$js_line1 = new Maths\Geometry\Segment($a, $b);
$jxg->drawSegment($js_line1);

$r1 = new Maths\Geometry\Point(-2,6);
$r2 = new Maths\Geometry\Point(2,6);
$r3 = new Maths\Geometry\Point(2,8);
$r4 = new Maths\Geometry\Point(-2,8);

echo $jxg;
?>
</script>

        </article>
    </div>

    <footer id="footer">
		<div class="credits float-left">
		    This page is <a href="" title="Check now online" id="html_validation">HTML5</a> & <a href="" title="Check now online" id="css_validation">CSS3</a> valid.
		</div>
		<div class="credits float-right">
		    <a href="http://github.com/atelierspierrot/maths">atelierspierrot/maths</a> package by <a href="https://github.com/atelierspierrot">Les Ateliers Pierrot</a> under <a href="http://opensource.org/licenses/GPL-3.0">GNU GPL v.3</a> license.
		</div>
    </footer>

    <div class="back_menu" id="short_navigation">
        <a href="#" title="See navigation menu" id="short_menu_handler"><span class="text">Navigation Menu</span></a>
        &nbsp;|&nbsp;
        <a href="#top" title="Back to the top of the page"><span class="text">Back to top&nbsp;</span>&uarr;</a>
        <ul id="short_menu" class="menu" role="navigation"></ul>
    </div>

    <div id="message_box" class="msg_box"></div>

<!-- jQuery lib -->
<script src="assets/js/jquery-1.9.1.min.js"></script>

<!-- HTML5 boilerplate -->
<script src="assets/html5boilerplate/js/plugins.js"></script>

<!-- jQuery.highlight plugin -->
<script src="assets/js/highlight.js"></script>

<!-- scripts for demo -->
<script src="assets/scripts.js"></script>

<script>
$(function() {
    initBacklinks();
    activateMenuItem();
    getToHash();
    buildFootNotes();
    addCSSValidatorLink('assets/styles.css');
    addHTMLValidatorLink();
    $("#user_agent").html( navigator.userAgent );
    $('pre.code').highlight({source:0, indent:'tabs', code_lang: 'data-language'});
});
</script>
</body>
</html>
