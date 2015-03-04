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

$demos = array(
    'basics',
    'trigonometrics',
    'thales',
    'tests'
);

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
                <li><a href="index.php#presentation">Presentation</a></li>
                <li><a href="index.php#points">Points</a></li>
                <li><a href="index.php#lines">Lines and Segments</a></li>
                <li><a href="index.php#quadri">Quadrilaterals</a></li>
                <li><a href="index.php#triangles">Triangles</a></li>
                <li><a href="index.php#circles">Circles</a></li>
                <li><a href="index.php#jsgraph">Representation</a></li>
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
    

<p>&#x61; &#x40; &#xCA; &#xFB;</p>
    <p>&#61; &#40; &#171; &#x171;</p>


<h3 id="presentation">Presentation</h3>

<p>This namespace defines objects to work with geometric objects in 1, 2 or 3 dimensional spaces. By convention, the coordinates of the objects are called <code>( abscissa , ordinate , applicate )</code>, but your can access each of them using the following shortcuts:</p>
<ul>
    <li>the <em>abscissa</em> coordinate can be accessed with index <code>0</code> or <code>x</code> (case insensitive)</li>
    <li>the <em>ordinate</em> coordinate can be accessed with index <code>1</code> or <code>y</code> (case insensitive)</li>
    <li>the <em>applicate</em> coordinate can be accessed with index <code>2</code> or <code>z</code> (case insensitive)</li>
</ul>
<p>Each of these coordinates can be accessed directly like <code>$obj->name</code> or by array access like <code>$obj[name]</code>.</p>

<h3 id="points">Points: Maths\PointInterface</h3>

    <h4>Maths\Point1D</h4>

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
?>
    </pre>

    <h4>Maths\Point2D</h4>

    <pre class="code" data-language="php">
<?php
$point2d = new Maths\Point2D(3,6);
echo '$point2d = new Maths\Point2D(3,6);'."\n";
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

echo "\n\n";
echo '$point2d->name = "D";'."\n";
echo 'var_export($point2d);'."\n";
$point2d->name = 'D';
var_export($point2d);

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

    <h4>Maths\Point3D</h4>

    <pre class="code" data-language="php">
<?php
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

?>
</pre>

<h3 id="lines">Lines & segments</h3>

    <h4>Maths\Geometry\Line</h4>

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
echo 'echo $line1->equation;'."\n";
echo $line1->equation."\n";

echo "\n\n";
$test_pointa = new \Maths\Geometry\Point(1,3.75);
$test_pointb = new \Maths\Geometry\Point(3,2);
echo '$test_pointa = new \Maths\Geometry\Point(1,3.75);'."\n";
echo '$test_pointb = new \Maths\Geometry\Point(3,2);'."\n";
echo '$line1->isValidPoint($test_pointa);'."\n";
echo var_export($line1->isValidPoint($test_pointa),1)."\n";
echo '$line1->isValidPoint($test_pointb);'."\n";
echo var_export($line1->isValidPoint($test_pointb),1)."\n";
?>
    </pre>

    <h4>Maths\Geometry\Segment</h4>

    <pre class="code" data-language="php">
<?php
echo '$segment_pointa = new \Maths\Geometry\Point(2,4);'."\n";
echo '$segment_pointb = new \Maths\Geometry\Point(-2,3);'."\n";
echo '$segment1 = new \Maths\Geometry\Segment($segment_pointa, $segment_pointb);'."\n";
$segment_pointa = new \Maths\Geometry\Point(2,4);
$segment_pointb = new \Maths\Geometry\Point(-2,3);
$segment1 = new \Maths\Geometry\Segment($segment_pointa, $segment_pointb);
echo 'echo $segment1;'."\n";
echo $segment1."\n";
echo 'echo $segment1->equation;'."\n";
echo $segment1->equation."\n";

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

    <h3 id="quadri">Quadrilaterals</h3>

    <h4>Maths\Geometry\Quadrilateral</h4>
    
    <pre class="code" data-language="php">
<?php

echo '$rec_pointA = new \Maths\Geometry\Point(1,2);'."\n";
echo '$rec_pointB = new \Maths\Geometry\Point(4,2);'."\n";
echo '$rec_pointC = new \Maths\Geometry\Point(4,4);'."\n";
echo '$rec_pointD = new \Maths\Geometry\Point(1,4);'."\n";
$rec_pointA = new \Maths\Geometry\Point(1,2);
$rec_pointB = new \Maths\Geometry\Point(4,2);
$rec_pointC = new \Maths\Geometry\Point(4,4);
$rec_pointD = new \Maths\Geometry\Point(1,4);
echo '$quadri = new \Maths\Geometry\Quadrilateral($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);'."\n";
$quadri = new \Maths\Geometry\Quadrilateral($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);
echo 'echo $quadri;'."\n";
echo $quadri."\n";
//var_export($quadri);
echo 'echo $quadri->equation;'."\n";
echo $quadri->equation."\n";
echo 'echo $quadri->isParallelogram();'."\n";
echo var_export($quadri->isParallelogram(),1)."\n";

?>
    </pre>
    
    <h4>Maths\Geometry\Rectangle</h4>
    
    <pre class="code" data-language="php">
<?php
echo '$rect = new \Maths\Geometry\Rectangle($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);'."\n";
$rect = new \Maths\Geometry\Rectangle($rec_pointA, $rec_pointB, $rec_pointC, $rec_pointD);
echo 'echo $rect;'."\n";
echo $rect."\n";
echo 'echo $rect->equation;'."\n";
echo $rect->equation."\n";
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

    <h3 id="triangles">Triangles</h3>

    <pre class="code" data-language="php">
<?php

echo '$tri_point1 = new \Maths\Geometry\Point(-1,-2);'."\n";
$tri_point1 = new \Maths\Geometry\Point(-1,-2);;
echo '$tri_point2 = new \Maths\Geometry\Point(2,4);'."\n";
$tri_point2 = new \Maths\Geometry\Point(2,4);;
echo '$tri_point3 = new \Maths\Geometry\Point(1,1);'."\n";
$tri_point3 = new \Maths\Geometry\Point(1,1);;
echo '$tri = new \Maths\Geometry\Triangle($tri_point1, $tri_point2, $tri_point3);'."\n";
$tri = new \Maths\Geometry\Triangle($tri_point1, $tri_point2, $tri_point3);
echo 'echo $tri;'."\n";
echo $tri."\n";
echo 'echo $tri->equation;'."\n";
echo $tri->equation."\n";
//var_export($tri);

echo 'echo $tri->area'."\n";
echo $tri->area."\n";
echo 'echo $tri->perimeter'."\n";
echo $tri->perimeter."\n";

?>
    </pre>

    <h3 id="circles">Circles and discs</h3>

    <pre class="code" data-language="php">
<?php

echo '$circ_pointO = new \Maths\Geometry\Point(-1,-2);'."\n";
$circ_pointO = new \Maths\Geometry\Point(-1,-2);
echo '$circ = new \Maths\Geometry\Circle($rec_point0, 3);'."\n";
$circ = new \Maths\Geometry\Circle($circ_pointO, 3);
echo 'echo $circ;'."\n";
echo $circ."\n";
echo 'echo $circ->equation;'."\n";
echo $circ->equation."\n";
//var_export($circ);

echo 'echo $circ->diameter;'."\n";
echo $circ->diameter."\n";
echo 'echo $circ->perimeter;'."\n";
echo $circ->perimeter."\n";

echo "\n";
echo '$circ_test1_x = 1;'."\n";
echo '$circ_test1_y = $circ->getOrdinateByAbscissa($circ_test1_x);'."\n";
echo 'echo $circ_test1_y;'."\n";
echo '$circ_test1 = new \Maths\Geometry\Point($circ_test1_x,$circ_test1_y);'."\n";
echo 'echo $circ->isValidPoint($circ_test1);'."\n";
$circ_test1_x = 1;
$circ_test1_y = $circ->getOrdinateByAbscissa($circ_test1_x);
echo $circ_test1_y."\n";
$circ_test1 = new \Maths\Geometry\Point($circ_test1_x,$circ_test1_y);
echo var_export($circ->isValidPoint($circ_test1),1)."\n";

echo "\n";
echo '$circ_test2 = new \Maths\Geometry\Point(-1,0.5);'."\n";
echo 'echo $circ->isValidPoint($circ_test2);'."\n";
$circ_test2 = new \Maths\Geometry\Point(-1,0.5);
echo var_export($circ->isValidPoint($circ_test2),1)."\n";

echo "\n";
echo '$disc_pointO = new \Maths\Geometry\Point(-2,4);'."\n";
$disc_pointO = new \Maths\Geometry\Point(-2,4);
echo '$disc = new \Maths\Geometry\Circle($disc_point0, 4);'."\n";
$disc = new \Maths\Geometry\Disc($disc_pointO, 4);
echo 'echo $disc;'."\n";
echo $disc."\n";
//var_export($disc);
echo 'echo $disc->area;'."\n";
echo $disc->area."\n";

echo "\n";
echo 'echo $circ->isValidPoint($circ_test2);'."\n";
echo var_export($disc->isValidPoint($circ_test2),1)."\n";

?>
    </pre>

    <h3 id="jsgraph">Representation</h3>

    <p>This representation uses the javascript library <a href="http://jsxgraph.uni-bayreuth.de/wp/">JSXgraph</a> under both GNU Lesser GPL and MIT licenses.</p>
    <p>The package embeds a <code>\Maths\Helper\JXSgraph</code> class to help construct the js library usage.</p>

<?php foreach ($demos as $i=>$_demo) : ?>

    <div class="jxs-wrapper" style="position: relative; clear: both; margin: 1em auto;">
        <h4 style="display: block;"><?php echo ucwords($_demo); ?></h4>
        <div id="box<?php echo $i; ?>" class="jxgbox" style="width:500px; height:500px;float: left;"></div>
        <div id="codebox<?php echo $i; ?>" style="float: left; max-width: 600px;margin-left: 12px;">
            <pre class="code" data-language="php">
                <?php
                $ctt = file_get_contents('jsx_codes/'.$_demo.'.php');
                echo substr($ctt, 6);
                ?>
            </pre>
        </div>
        <script type="text/javascript">
    <?php
            $BOXID = 'box'.$i;
            include 'jsx_codes/'.$_demo.'.php';
    ?>
        </script>
    </div>

<?php endforeach; ?>

        </article>
    </div>

    <footer id="footer">
		<div class="credits float-left">
		    This page is <a href="" title="Check now online" id="html_validation">HTML5</a> & <a href="" title="Check now online" id="css_validation">CSS3</a> valid.
		</div>
		<div class="credits float-right">
		    <a href="http://github.com/atelierspierrot/maths">atelierspierrot/maths</a> package by <a href="https://github.com/atelierspierrot">Les Ateliers Pierrot</a> under <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache 2.0</a> license.
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
