(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '    <ul>                <li data-name="namespace:Maths" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Maths.html">Maths</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:Maths_Algebra" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Maths/Algebra.html">Algebra</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Maths_Algebra_Matrix" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Algebra/Matrix.html">Matrix</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Maths_Arithmetic" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Maths/Arithmetic.html">Arithmetic</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Maths_Arithmetic_Helper" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Arithmetic/Helper.html">Helper</a>                    </div>                </li>                            <li data-name="class:Maths_Arithmetic_PascalTriangle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Arithmetic/PascalTriangle.html">PascalTriangle</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Maths_Geometry" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Maths/Geometry.html">Geometry</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Maths_Geometry_AbstractGeometricObject" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/AbstractGeometricObject.html">AbstractGeometricObject</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Angle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Angle.html">Angle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Circle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Circle.html">Circle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Disc" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Disc.html">Disc</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Line" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Line.html">Line</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Point" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Point.html">Point</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Quadrilateral" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Quadrilateral.html">Quadrilateral</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Rectangle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Rectangle.html">Rectangle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_RightTriangle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/RightTriangle.html">RightTriangle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Segment" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Segment.html">Segment</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Triangle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Triangle.html">Triangle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_TriangleRectangle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/TriangleRectangle.html">TriangleRectangle</a>                    </div>                </li>                            <li data-name="class:Maths_Geometry_Vector" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Geometry/Vector.html">Vector</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Maths_Helper" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Maths/Helper.html">Helper</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Maths_Helper_JSXgraph" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Maths/Helper/JSXgraph.html">JSXgraph</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Maths_AbstractCartesianObject" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/AbstractCartesianObject.html">AbstractCartesianObject</a>                    </div>                </li>                            <li data-name="class:Maths_Cartesian1DInterface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Cartesian1DInterface.html">Cartesian1DInterface</a>                    </div>                </li>                            <li data-name="class:Maths_Cartesian2DInterface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Cartesian2DInterface.html">Cartesian2DInterface</a>                    </div>                </li>                            <li data-name="class:Maths_Cartesian3DInterface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Cartesian3DInterface.html">Cartesian3DInterface</a>                    </div>                </li>                            <li data-name="class:Maths_CartesianInterface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/CartesianInterface.html">CartesianInterface</a>                    </div>                </li>                            <li data-name="class:Maths_Maths" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Maths.html">Maths</a>                    </div>                </li>                            <li data-name="class:Maths_Point1D" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Point1D.html">Point1D</a>                    </div>                </li>                            <li data-name="class:Maths_Point2D" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Point2D.html">Point2D</a>                    </div>                </li>                            <li data-name="class:Maths_Point3D" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/Point3D.html">Point3D</a>                    </div>                </li>                            <li data-name="class:Maths_PointInterface" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Maths/PointInterface.html">PointInterface</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    {"type": "Namespace", "link": "Maths.html", "name": "Maths", "doc": "Namespace Maths"},{"type": "Namespace", "link": "Maths/Algebra.html", "name": "Maths\\Algebra", "doc": "Namespace Maths\\Algebra"},{"type": "Namespace", "link": "Maths/Arithmetic.html", "name": "Maths\\Arithmetic", "doc": "Namespace Maths\\Arithmetic"},{"type": "Namespace", "link": "Maths/Geometry.html", "name": "Maths\\Geometry", "doc": "Namespace Maths\\Geometry"},{"type": "Namespace", "link": "Maths/Helper.html", "name": "Maths\\Helper", "doc": "Namespace Maths\\Helper"},
            {"type": "Interface", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian1DInterface.html", "name": "Maths\\Cartesian1DInterface", "doc": "&quot;Basic 1D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian1DInterface", "fromLink": "Maths/Cartesian1DInterface.html", "link": "Maths/Cartesian1DInterface.html#method_getDistance", "name": "Maths\\Cartesian1DInterface::getDistance", "doc": "&quot;Get the distance between the two points of the objects&quot;"},
            
            {"type": "Interface", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian2DInterface.html", "name": "Maths\\Cartesian2DInterface", "doc": "&quot;Basic 2D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian2DInterface", "fromLink": "Maths/Cartesian2DInterface.html", "link": "Maths/Cartesian2DInterface.html#method_getArea", "name": "Maths\\Cartesian2DInterface::getArea", "doc": "&quot;Get the area of the object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Cartesian2DInterface", "fromLink": "Maths/Cartesian2DInterface.html", "link": "Maths/Cartesian2DInterface.html#method_getPerimeter", "name": "Maths\\Cartesian2DInterface::getPerimeter", "doc": "&quot;Get the perimeter of the object&quot;"},
            
            {"type": "Interface", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian3DInterface.html", "name": "Maths\\Cartesian3DInterface", "doc": "&quot;Basic 3D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian3DInterface", "fromLink": "Maths/Cartesian3DInterface.html", "link": "Maths/Cartesian3DInterface.html#method_getVolume", "name": "Maths\\Cartesian3DInterface::getVolume", "doc": "&quot;Get the volume of the object&quot;"},
            
            {"type": "Interface", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/CartesianInterface.html", "name": "Maths\\CartesianInterface", "doc": "&quot;Basic geometric objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\CartesianInterface", "fromLink": "Maths/CartesianInterface.html", "link": "Maths/CartesianInterface.html#method_isValidPoint", "name": "Maths\\CartesianInterface::isValidPoint", "doc": "&quot;Test if point A is part of the object&quot;"},
            
            {"type": "Interface", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/PointInterface.html", "name": "Maths\\PointInterface", "doc": "&quot;The point interface&quot;"},
                    
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/AbstractCartesianObject.html", "name": "Maths\\AbstractCartesianObject", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___construct", "name": "Maths\\AbstractCartesianObject::__construct", "doc": "&quot;Construction of a cartesian object specify a number of space dimensions (default is 2D)&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_setSpaceType", "name": "Maths\\AbstractCartesianObject::setSpaceType", "doc": "&quot;Define the object cartesian space type (number of dimensions)&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_getSpaceType", "name": "Maths\\AbstractCartesianObject::getSpaceType", "doc": "&quot;Get the object cartesian space type (number of dimensions)&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_is1D", "name": "Maths\\AbstractCartesianObject::is1D", "doc": "&quot;Test if the object is in 1D only&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_is2D", "name": "Maths\\AbstractCartesianObject::is2D", "doc": "&quot;Test if the object is in 2D&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_is3D", "name": "Maths\\AbstractCartesianObject::is3D", "doc": "&quot;Test if the object is in 3D&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___set", "name": "Maths\\AbstractCartesianObject::__set", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___get", "name": "Maths\\AbstractCartesianObject::__get", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___isset", "name": "Maths\\AbstractCartesianObject::__isset", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___unset", "name": "Maths\\AbstractCartesianObject::__unset", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_offsetExists", "name": "Maths\\AbstractCartesianObject::offsetExists", "doc": "&quot;Test if an offset exists in the object using array notation &lt;code&gt;isset($obj[offset])&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_offsetGet", "name": "Maths\\AbstractCartesianObject::offsetGet", "doc": "&quot;Get an object coordinate using array notation &lt;code&gt;$obj[offset]&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_offsetSet", "name": "Maths\\AbstractCartesianObject::offsetSet", "doc": "&quot;Set an object coordinate using array notation &lt;code&gt;$obj[offset] = value&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method_offsetUnset", "name": "Maths\\AbstractCartesianObject::offsetUnset", "doc": "&quot;Set an object coordinate using array notation &lt;code&gt;unset($obj[offset])&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\AbstractCartesianObject", "fromLink": "Maths/AbstractCartesianObject.html", "link": "Maths/AbstractCartesianObject.html#method___toString", "name": "Maths\\AbstractCartesianObject::__toString", "doc": "&quot;Force children classes to define a way to &lt;code&gt;echo&lt;\/code&gt; an object, usually like &lt;code&gt;( x , y , z)&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Algebra", "fromLink": "Maths/Algebra.html", "link": "Maths/Algebra/Matrix.html", "name": "Maths\\Algebra\\Matrix", "doc": "&quot;Class Matrix&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method___construct", "name": "Maths\\Algebra\\Matrix::__construct", "doc": "&quot;MATRIX constructor&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method___toString", "name": "Maths\\Algebra\\Matrix::__toString", "doc": "&quot;Magic method to &lt;code&gt;echo $object&lt;\/code&gt; which returns a 2D representation of the matrix&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_reset", "name": "Maths\\Algebra\\Matrix::reset", "doc": "&quot;Reset object &lt;code&gt;$data&lt;\/code&gt; to its original state&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getSize", "name": "Maths\\Algebra\\Matrix::getSize", "doc": "&quot;Get the matrix size&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setWalkFlag", "name": "Maths\\Algebra\\Matrix::setWalkFlag", "doc": "&quot;Define the object&#039;s walk flag&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getWalkFlag", "name": "Maths\\Algebra\\Matrix::getWalkFlag", "doc": "&quot;Get the current object&#039;s walk flag&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setArrayFlag", "name": "Maths\\Algebra\\Matrix::setArrayFlag", "doc": "&quot;Define the object&#039;s array access flag&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getArrayFlag", "name": "Maths\\Algebra\\Matrix::getArrayFlag", "doc": "&quot;Get the current object&#039;s array access flag&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setEmptyCell", "name": "Maths\\Algebra\\Matrix::setEmptyCell", "doc": "&quot;Set the empty cell value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getEmptyCell", "name": "Maths\\Algebra\\Matrix::getEmptyCell", "doc": "&quot;Get the empty cell value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setData", "name": "Maths\\Algebra\\Matrix::setData", "doc": "&quot;Set the matrix contents&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getData", "name": "Maths\\Algebra\\Matrix::getData", "doc": "&quot;Get the matrix as array&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_get", "name": "Maths\\Algebra\\Matrix::get", "doc": "&quot;Get a cell value by index according to matrix&#039;s flags&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getX", "name": "Maths\\Algebra\\Matrix::getX", "doc": "&quot;Get &lt;code&gt;x&lt;\/code&gt; value (line) by index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getY", "name": "Maths\\Algebra\\Matrix::getY", "doc": "&quot;Get &lt;code&gt;y&lt;\/code&gt; value (column) by index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getXY", "name": "Maths\\Algebra\\Matrix::getXY", "doc": "&quot;Get &lt;code&gt;x:y&lt;\/code&gt; value (cell) by positional index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getInt", "name": "Maths\\Algebra\\Matrix::getInt", "doc": "&quot;Get &lt;code&gt;x:y&lt;\/code&gt; value (cell) by integer index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_set", "name": "Maths\\Algebra\\Matrix::set", "doc": "&quot;Set a value by index according to matrix&#039;s flags&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setX", "name": "Maths\\Algebra\\Matrix::setX", "doc": "&quot;Set &lt;code&gt;x&lt;\/code&gt; value (line) by index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setY", "name": "Maths\\Algebra\\Matrix::setY", "doc": "&quot;Set &lt;code&gt;y&lt;\/code&gt; value (column) by index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setXY", "name": "Maths\\Algebra\\Matrix::setXY", "doc": "&quot;Set &lt;code&gt;x:y&lt;\/code&gt; value (cell) by positional index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_setInt", "name": "Maths\\Algebra\\Matrix::setInt", "doc": "&quot;Set &lt;code&gt;x:y&lt;\/code&gt; value (cell) by integer index&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_rewind", "name": "Maths\\Algebra\\Matrix::rewind", "doc": "&quot;Rewind a matrix according to its flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_rewindX", "name": "Maths\\Algebra\\Matrix::rewindX", "doc": "&quot;Rewind &lt;code&gt;x&lt;\/code&gt; index to position &lt;code&gt;1&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_rewindY", "name": "Maths\\Algebra\\Matrix::rewindY", "doc": "&quot;Rewind &lt;code&gt;y&lt;\/code&gt; index to position &lt;code&gt;1&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_rewindXY", "name": "Maths\\Algebra\\Matrix::rewindXY", "doc": "&quot;Rewind both &lt;code&gt;x&lt;\/code&gt; and &lt;code&gt;y&lt;\/code&gt; indexes to position &lt;code&gt;1,1&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previous", "name": "Maths\\Algebra\\Matrix::previous", "doc": "&quot;Go to previous index according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previousX", "name": "Maths\\Algebra\\Matrix::previousX", "doc": "&quot;Seek to current &lt;code&gt;x&lt;\/code&gt; less 1&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previousXExists", "name": "Maths\\Algebra\\Matrix::previousXExists", "doc": "&quot;Test if current &lt;code&gt;x&lt;\/code&gt; less 1 exists&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previousY", "name": "Maths\\Algebra\\Matrix::previousY", "doc": "&quot;Seek to current &lt;code&gt;y&lt;\/code&gt; less 1&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previousYExists", "name": "Maths\\Algebra\\Matrix::previousYExists", "doc": "&quot;Test if current &lt;code&gt;y&lt;\/code&gt; less 1 exists&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_previousXY", "name": "Maths\\Algebra\\Matrix::previousXY", "doc": "&quot;Seek to previous cell&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_next", "name": "Maths\\Algebra\\Matrix::next", "doc": "&quot;Go to next index according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_nextX", "name": "Maths\\Algebra\\Matrix::nextX", "doc": "&quot;Seek to current &lt;code&gt;x&lt;\/code&gt; plus 1&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_nextXExists", "name": "Maths\\Algebra\\Matrix::nextXExists", "doc": "&quot;Test if current &lt;code&gt;x&lt;\/code&gt; plus 1 exists&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_nextY", "name": "Maths\\Algebra\\Matrix::nextY", "doc": "&quot;Seek to current &lt;code&gt;y&lt;\/code&gt; plus 1&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_nextYExists", "name": "Maths\\Algebra\\Matrix::nextYExists", "doc": "&quot;Test if current &lt;code&gt;y&lt;\/code&gt; plus 1 exists&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_nextXY", "name": "Maths\\Algebra\\Matrix::nextXY", "doc": "&quot;Go to next cell&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seek", "name": "Maths\\Algebra\\Matrix::seek", "doc": "&quot;Seek to index according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekX", "name": "Maths\\Algebra\\Matrix::seekX", "doc": "&quot;Seek to index for &lt;code&gt;x&lt;\/code&gt; (line)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekY", "name": "Maths\\Algebra\\Matrix::seekY", "doc": "&quot;Seek to index for &lt;code&gt;y&lt;\/code&gt; (column)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekXY", "name": "Maths\\Algebra\\Matrix::seekXY", "doc": "&quot;Seek to index for &lt;code&gt;x,y&lt;\/code&gt; (cell)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekInt", "name": "Maths\\Algebra\\Matrix::seekInt", "doc": "&quot;Go to index &lt;code&gt;x,y&lt;\/code&gt; represented as an integer (0 based)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_current", "name": "Maths\\Algebra\\Matrix::current", "doc": "&quot;Get current value according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_currentX", "name": "Maths\\Algebra\\Matrix::currentX", "doc": "&quot;Get current &lt;code&gt;x&lt;\/code&gt; value (line)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_currentY", "name": "Maths\\Algebra\\Matrix::currentY", "doc": "&quot;Get current &lt;code&gt;y&lt;\/code&gt; value (column)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_currentXY", "name": "Maths\\Algebra\\Matrix::currentXY", "doc": "&quot;Get current &lt;code&gt;x:y&lt;\/code&gt; value (cell)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_key", "name": "Maths\\Algebra\\Matrix::key", "doc": "&quot;Get current index according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_keyX", "name": "Maths\\Algebra\\Matrix::keyX", "doc": "&quot;Get current &lt;code&gt;x&lt;\/code&gt; index (line)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_keyY", "name": "Maths\\Algebra\\Matrix::keyY", "doc": "&quot;Get current &lt;code&gt;y&lt;\/code&gt; index (column)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_keyXY", "name": "Maths\\Algebra\\Matrix::keyXY", "doc": "&quot;Get current &lt;code&gt;x,y&lt;\/code&gt; index (cell)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_keyInt", "name": "Maths\\Algebra\\Matrix::keyInt", "doc": "&quot;Get current &lt;code&gt;x,y&lt;\/code&gt; index as an integer (0 based)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_valid", "name": "Maths\\Algebra\\Matrix::valid", "doc": "&quot;Test if current value is valid according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_validX", "name": "Maths\\Algebra\\Matrix::validX", "doc": "&quot;Test if current &lt;code&gt;x&lt;\/code&gt; line is valid&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_validY", "name": "Maths\\Algebra\\Matrix::validY", "doc": "&quot;Test if current &lt;code&gt;y&lt;\/code&gt; column is valid&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_validXY", "name": "Maths\\Algebra\\Matrix::validXY", "doc": "&quot;Test if current &lt;code&gt;x:y&lt;\/code&gt; cell is valid&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_count", "name": "Maths\\Algebra\\Matrix::count", "doc": "&quot;Count the number of values according to matrix&#039;s flag value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_countX", "name": "Maths\\Algebra\\Matrix::countX", "doc": "&quot;Count the number of lines&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_countY", "name": "Maths\\Algebra\\Matrix::countY", "doc": "&quot;Count the number of columns&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_countXY", "name": "Maths\\Algebra\\Matrix::countXY", "doc": "&quot;Count the number of cells&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekToOffset", "name": "Maths\\Algebra\\Matrix::seekToOffset", "doc": "&quot;Seek &lt;code&gt;x&lt;\/code&gt; and &lt;code&gt;y&lt;\/code&gt; to an offset&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekToOffsetInteger", "name": "Maths\\Algebra\\Matrix::seekToOffsetInteger", "doc": "&quot;Seek &lt;code&gt;x&lt;\/code&gt; and &lt;code&gt;y&lt;\/code&gt; to an integer offset&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_seekToOffsetPositional", "name": "Maths\\Algebra\\Matrix::seekToOffsetPositional", "doc": "&quot;Seek &lt;code&gt;x&lt;\/code&gt; and &lt;code&gt;y&lt;\/code&gt; to a positional offset&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_offsetExists", "name": "Maths\\Algebra\\Matrix::offsetExists", "doc": "&quot;Test if an offset exists&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_offsetGet", "name": "Maths\\Algebra\\Matrix::offsetGet", "doc": "&quot;Get an offset value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_offsetSet", "name": "Maths\\Algebra\\Matrix::offsetSet", "doc": "&quot;Set an offset value&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_offsetUnset", "name": "Maths\\Algebra\\Matrix::offsetUnset", "doc": "&quot;Unset an offset value (replacing it by &#039;0&#039;)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_serialize", "name": "Maths\\Algebra\\Matrix::serialize", "doc": "&quot;Serialize a matrix: only &lt;code&gt;$data&lt;\/code&gt;, &lt;code&gt;$_cache&lt;\/code&gt; and &lt;code&gt;$flag&lt;\/code&gt; are stored&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_unserialize", "name": "Maths\\Algebra\\Matrix::unserialize", "doc": "&quot;Populate a matrix from a serialized array: only &lt;code&gt;$data&lt;\/code&gt;, &lt;code&gt;$_cache&lt;\/code&gt; and &lt;code&gt;$flag&lt;\/code&gt; are populated&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getLine", "name": "Maths\\Algebra\\Matrix::getLine", "doc": "&quot;Get a line value (specifying an optional index)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getColumn", "name": "Maths\\Algebra\\Matrix::getColumn", "doc": "&quot;Get a column value (specifying an optional index)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_getCell", "name": "Maths\\Algebra\\Matrix::getCell", "doc": "&quot;Get a cell value (specifying an optional index)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_isSquareMatrix", "name": "Maths\\Algebra\\Matrix::isSquareMatrix", "doc": "&quot;Test if a matrix is a square (number of lines = number of columns)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_isRowVector", "name": "Maths\\Algebra\\Matrix::isRowVector", "doc": "&quot;Test if a matrix is a row vector (one single line)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method_isColumnVector", "name": "Maths\\Algebra\\Matrix::isColumnVector", "doc": "&quot;Test if a matrix is a column vector (one single column)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Algebra\\Matrix", "fromLink": "Maths/Algebra/Matrix.html", "link": "Maths/Algebra/Matrix.html#method___debug", "name": "Maths\\Algebra\\Matrix::__debug", "doc": "&quot;Special &lt;code&gt;__toString()&lt;\/code&gt; with infos&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Arithmetic", "fromLink": "Maths/Arithmetic.html", "link": "Maths/Arithmetic/Helper.html", "name": "Maths\\Arithmetic\\Helper", "doc": "&quot;Basic class for arithemtic&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_factorial", "name": "Maths\\Arithmetic\\Helper::factorial", "doc": "&quot;Calculate the \&quot;factorial\&quot; resolution of a number: &lt;code&gt;a!&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_asFloat", "name": "Maths\\Arithmetic\\Helper::asFloat", "doc": "&quot;Write a number as a float what ever value it is (&amp;lt; 0.0000000.&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_getTriangularNumber", "name": "Maths\\Arithmetic\\Helper::getTriangularNumber", "doc": "&quot;Get the n-th triangular numbet:&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_modulo", "name": "Maths\\Arithmetic\\Helper::modulo", "doc": "&quot;Try to get the \&quot;true\&quot; modulo&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_getModuloFromEntirePart", "name": "Maths\\Arithmetic\\Helper::getModuloFromEntirePart", "doc": "&quot;This method is an alternative to the native &lt;code&gt;a % b&lt;\/code&gt; using the \&quot;entire part\&quot; method.&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_getModuloUsingTruncation", "name": "Maths\\Arithmetic\\Helper::getModuloUsingTruncation", "doc": "&quot;This method is an alternative to the native &lt;code&gt;a % b&lt;\/code&gt; using the loop method.&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_isNarcissicNumber", "name": "Maths\\Arithmetic\\Helper::isNarcissicNumber", "doc": "&quot;Test if a number is an \&quot;narcissic\&quot; number: an n-digit number that is equal to the sum of the n&#039;th powers of its digits&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_isArmstrongNumber", "name": "Maths\\Arithmetic\\Helper::isArmstrongNumber", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_isHappyNumber", "name": "Maths\\Arithmetic\\Helper::isHappyNumber", "doc": "&quot;Test if a number is an \&quot;happy number\&quot;:&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_EuclideanDivision", "name": "Maths\\Arithmetic\\Helper::EuclideanDivision", "doc": "&quot;Make the \&quot;euclidean division\&quot; &lt;code&gt;a \/ b&lt;\/code&gt; having a result like &lt;code&gt;array( divisor , rest )&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\Helper", "fromLink": "Maths/Arithmetic/Helper.html", "link": "Maths/Arithmetic/Helper.html#method_GCD", "name": "Maths\\Arithmetic\\Helper::GCD", "doc": "&quot;Find the \&quot;GCD\&quot; (greatest common divisor) using the Euclide&#039;s algorithm&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Arithmetic", "fromLink": "Maths/Arithmetic.html", "link": "Maths/Arithmetic/PascalTriangle.html", "name": "Maths\\Arithmetic\\PascalTriangle", "doc": "&quot;Basic class for arithemtic&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Arithmetic\\PascalTriangle", "fromLink": "Maths/Arithmetic/PascalTriangle.html", "link": "Maths/Arithmetic/PascalTriangle.html#method_toString", "name": "Maths\\Arithmetic\\PascalTriangle::toString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\PascalTriangle", "fromLink": "Maths/Arithmetic/PascalTriangle.html", "link": "Maths/Arithmetic/PascalTriangle.html#method_getSuite", "name": "Maths\\Arithmetic\\PascalTriangle::getSuite", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Arithmetic\\PascalTriangle", "fromLink": "Maths/Arithmetic/PascalTriangle.html", "link": "Maths/Arithmetic/PascalTriangle.html#method_get", "name": "Maths\\Arithmetic\\PascalTriangle::get", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian1DInterface.html", "name": "Maths\\Cartesian1DInterface", "doc": "&quot;Basic 1D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian1DInterface", "fromLink": "Maths/Cartesian1DInterface.html", "link": "Maths/Cartesian1DInterface.html#method_getDistance", "name": "Maths\\Cartesian1DInterface::getDistance", "doc": "&quot;Get the distance between the two points of the objects&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian2DInterface.html", "name": "Maths\\Cartesian2DInterface", "doc": "&quot;Basic 2D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian2DInterface", "fromLink": "Maths/Cartesian2DInterface.html", "link": "Maths/Cartesian2DInterface.html#method_getArea", "name": "Maths\\Cartesian2DInterface::getArea", "doc": "&quot;Get the area of the object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Cartesian2DInterface", "fromLink": "Maths/Cartesian2DInterface.html", "link": "Maths/Cartesian2DInterface.html#method_getPerimeter", "name": "Maths\\Cartesian2DInterface::getPerimeter", "doc": "&quot;Get the perimeter of the object&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Cartesian3DInterface.html", "name": "Maths\\Cartesian3DInterface", "doc": "&quot;Basic 3D objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Cartesian3DInterface", "fromLink": "Maths/Cartesian3DInterface.html", "link": "Maths/Cartesian3DInterface.html#method_getVolume", "name": "Maths\\Cartesian3DInterface::getVolume", "doc": "&quot;Get the volume of the object&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/CartesianInterface.html", "name": "Maths\\CartesianInterface", "doc": "&quot;Basic geometric objects interface&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\CartesianInterface", "fromLink": "Maths/CartesianInterface.html", "link": "Maths/CartesianInterface.html#method_isValidPoint", "name": "Maths\\CartesianInterface::isValidPoint", "doc": "&quot;Test if point A is part of the object&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/AbstractGeometricObject.html", "name": "Maths\\Geometry\\AbstractGeometricObject", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___construct", "name": "Maths\\Geometry\\AbstractGeometricObject::__construct", "doc": "&quot;Construction of a cartesian object specify a number of space dimensions (default is 2D)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method_setPoint", "name": "Maths\\Geometry\\AbstractGeometricObject::setPoint", "doc": "&quot;Define (or redefine) a point of the object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method_getPoint", "name": "Maths\\Geometry\\AbstractGeometricObject::getPoint", "doc": "&quot;Get a point of the object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method_getSegment", "name": "Maths\\Geometry\\AbstractGeometricObject::getSegment", "doc": "&quot;Get a [point1-&gt;point2] segment as a &lt;code&gt;\\Maths\\Geometry\\Segment&lt;\/code&gt; object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___set", "name": "Maths\\Geometry\\AbstractGeometricObject::__set", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___get", "name": "Maths\\Geometry\\AbstractGeometricObject::__get", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___isset", "name": "Maths\\Geometry\\AbstractGeometricObject::__isset", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___unset", "name": "Maths\\Geometry\\AbstractGeometricObject::__unset", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method_getEquation", "name": "Maths\\Geometry\\AbstractGeometricObject::getEquation", "doc": "&quot;Get the algebraic equation of the object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\AbstractGeometricObject", "fromLink": "Maths/Geometry/AbstractGeometricObject.html", "link": "Maths/Geometry/AbstractGeometricObject.html#method___equationToString", "name": "Maths\\Geometry\\AbstractGeometricObject::__equationToString", "doc": "&quot;Force children classes to define a way to get the algebraic function of the object&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Angle.html", "name": "Maths\\Geometry\\Angle", "doc": "&quot;Class Angle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method___construct", "name": "Maths\\Geometry\\Angle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method___toString", "name": "Maths\\Geometry\\Angle::__toString", "doc": "&quot;Write an angle object as `[alpha=.&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method___equationToString", "name": "Maths\\Geometry\\Angle::__equationToString", "doc": "&quot;Write an algebraic function of the angle\nThis will return the \&quot;toString\&quot; result&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setPointA", "name": "Maths\\Geometry\\Angle::setPointA", "doc": "&quot;Define point A of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getPointA", "name": "Maths\\Geometry\\Angle::getPointA", "doc": "&quot;Get the A point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setPointB", "name": "Maths\\Geometry\\Angle::setPointB", "doc": "&quot;Define point B of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getPointB", "name": "Maths\\Geometry\\Angle::getPointB", "doc": "&quot;Get the B point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setPointC", "name": "Maths\\Geometry\\Angle::setPointC", "doc": "&quot;Define point C of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getPointC", "name": "Maths\\Geometry\\Angle::getPointC", "doc": "&quot;Get the C point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setAngle", "name": "Maths\\Geometry\\Angle::setAngle", "doc": "&quot;Define the angle value (in degrees)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getAngle", "name": "Maths\\Geometry\\Angle::getAngle", "doc": "&quot;Get the angle value (in degrees by default)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setAngleByDeg", "name": "Maths\\Geometry\\Angle::setAngleByDeg", "doc": "&quot;Define the angle value in degrees&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_setAngleByRad", "name": "Maths\\Geometry\\Angle::setAngleByRad", "doc": "&quot;Define the angle value in radians&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getAngleToDeg", "name": "Maths\\Geometry\\Angle::getAngleToDeg", "doc": "&quot;Get the angle value in degrees (default)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_getAngleToRad", "name": "Maths\\Geometry\\Angle::getAngleToRad", "doc": "&quot;Get the angle value in radians&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_isRight", "name": "Maths\\Geometry\\Angle::isRight", "doc": "&quot;Test if the angle is right (90\u00b0)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_isStraight", "name": "Maths\\Geometry\\Angle::isStraight", "doc": "&quot;Test if the angle is straight (180\u00b0)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_isAcute", "name": "Maths\\Geometry\\Angle::isAcute", "doc": "&quot;Test if the angle is acute (&amp;lt; 90\u00b0)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_isObtuse", "name": "Maths\\Geometry\\Angle::isObtuse", "doc": "&quot;Test if the angle is obtuse (90\u00b0 &amp;lt; 180\u00b0)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Angle", "fromLink": "Maths/Geometry/Angle.html", "link": "Maths/Geometry/Angle.html#method_isReflex", "name": "Maths\\Geometry\\Angle::isReflex", "doc": "&quot;Test if the angle is reflex (180\u00b0 &amp;lt; 360\u00b0)&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Circle.html", "name": "Maths\\Geometry\\Circle", "doc": "&quot;Class Circle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method___construct", "name": "Maths\\Geometry\\Circle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method___toString", "name": "Maths\\Geometry\\Circle::__toString", "doc": "&quot;Write a circle like `[circ. O(x,y),r=.&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method___equationToString", "name": "Maths\\Geometry\\Circle::__equationToString", "doc": "&quot;Write an algebraic function of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_setRadius", "name": "Maths\\Geometry\\Circle::setRadius", "doc": "&quot;Define the radius value of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getRadius", "name": "Maths\\Geometry\\Circle::getRadius", "doc": "&quot;Get the radius value of the point&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_setPointO", "name": "Maths\\Geometry\\Circle::setPointO", "doc": "&quot;Define point O (origin) point of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getPointO", "name": "Maths\\Geometry\\Circle::getPointO", "doc": "&quot;Get the O (origin) point of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_setOrigin", "name": "Maths\\Geometry\\Circle::setOrigin", "doc": "&quot;Define point O (origin) point of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getOrigin", "name": "Maths\\Geometry\\Circle::getOrigin", "doc": "&quot;Get the O (origin) point of the circle&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getDiameter", "name": "Maths\\Geometry\\Circle::getDiameter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getPerimeter", "name": "Maths\\Geometry\\Circle::getPerimeter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_isValidPoint", "name": "Maths\\Geometry\\Circle::isValidPoint", "doc": "&quot;(x - Ox)^2 + (y - Oy)^2 = r^2&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getOrdinateByAbscissa", "name": "Maths\\Geometry\\Circle::getOrdinateByAbscissa", "doc": "&quot;Get the ordinate of a point of the circle by its abscissa&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Circle", "fromLink": "Maths/Geometry/Circle.html", "link": "Maths/Geometry/Circle.html#method_getAbscissaByOrdinate", "name": "Maths\\Geometry\\Circle::getAbscissaByOrdinate", "doc": "&quot;Get the abscissa of a point of the circle by its ordinate&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Disc.html", "name": "Maths\\Geometry\\Disc", "doc": "&quot;Class Disc&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Disc", "fromLink": "Maths/Geometry/Disc.html", "link": "Maths/Geometry/Disc.html#method___toString", "name": "Maths\\Geometry\\Disc::__toString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Disc", "fromLink": "Maths/Geometry/Disc.html", "link": "Maths/Geometry/Disc.html#method_getArea", "name": "Maths\\Geometry\\Disc::getArea", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Disc", "fromLink": "Maths/Geometry/Disc.html", "link": "Maths/Geometry/Disc.html#method_isValidCirclePoint", "name": "Maths\\Geometry\\Disc::isValidCirclePoint", "doc": "&quot;Test if a point is on the external circle of the disc&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Disc", "fromLink": "Maths/Geometry/Disc.html", "link": "Maths/Geometry/Disc.html#method_isValidPoint", "name": "Maths\\Geometry\\Disc::isValidPoint", "doc": "&quot;Test if a point is part of the disc ([O-&gt;a] &amp;lt;= r)&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Line.html", "name": "Maths\\Geometry\\Line", "doc": "&quot;Line class : two points A -&gt; B not limited&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method___construct", "name": "Maths\\Geometry\\Line::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method___toString", "name": "Maths\\Geometry\\Line::__toString", "doc": "&quot;Write a line object&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method___equationToString", "name": "Maths\\Geometry\\Line::__equationToString", "doc": "&quot;Write an algebraic function of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_setPointA", "name": "Maths\\Geometry\\Line::setPointA", "doc": "&quot;Define point A of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getPointA", "name": "Maths\\Geometry\\Line::getPointA", "doc": "&quot;Get the A point of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_setPointB", "name": "Maths\\Geometry\\Line::setPointB", "doc": "&quot;Define point B of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getPointB", "name": "Maths\\Geometry\\Line::getPointB", "doc": "&quot;Get the B point of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getSlope", "name": "Maths\\Geometry\\Line::getSlope", "doc": "&quot;Get the slope of the line: m = (By - Ay) \/ (Bx - Ax)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getYIntercept", "name": "Maths\\Geometry\\Line::getYIntercept", "doc": "&quot;Get the y-intercept of the line: b = Ay - (Ax * a)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_rearrange", "name": "Maths\\Geometry\\Line::rearrange", "doc": "&quot;Rearrange a segment to have [A-&gt;B] in requested direction&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_isVertical", "name": "Maths\\Geometry\\Line::isVertical", "doc": "&quot;Test if a line is vertical (constant X value)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_isHorizontal", "name": "Maths\\Geometry\\Line::isHorizontal", "doc": "&quot;Test if a line is horizontal (constant Y value)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_isLinear", "name": "Maths\\Geometry\\Line::isLinear", "doc": "&quot;Test if a line is linear (y-intercept = 0)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_isValidPoint", "name": "Maths\\Geometry\\Line::isValidPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getOrdinateByAbscissa", "name": "Maths\\Geometry\\Line::getOrdinateByAbscissa", "doc": "&quot;Get the ordinate of a point of the line by its abscissa&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Line", "fromLink": "Maths/Geometry/Line.html", "link": "Maths/Geometry/Line.html#method_getAbscissaByOrdinate", "name": "Maths\\Geometry\\Line::getAbscissaByOrdinate", "doc": "&quot;Get the abscissa of a point of the line by its ordinate&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Point.html", "name": "Maths\\Geometry\\Point", "doc": "&quot;Point class&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Point", "fromLink": "Maths/Geometry/Point.html", "link": "Maths/Geometry/Point.html#method___construct", "name": "Maths\\Geometry\\Point::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Point", "fromLink": "Maths/Geometry/Point.html", "link": "Maths/Geometry/Point.html#method___toString", "name": "Maths\\Geometry\\Point::__toString", "doc": "&quot;Write a 3D point as &lt;code&gt;( x , y , z )&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Quadrilateral.html", "name": "Maths\\Geometry\\Quadrilateral", "doc": "&quot;Class Quadrilateral&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method___construct", "name": "Maths\\Geometry\\Quadrilateral::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method___toString", "name": "Maths\\Geometry\\Quadrilateral::__toString", "doc": "&quot;Write a line object as &lt;code&gt;[(Ax,Ay),(Bx,By),(Cx,Cy),(Dx,Dy)]&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method___equationToString", "name": "Maths\\Geometry\\Quadrilateral::__equationToString", "doc": "&quot;Write an algebraic function of the quadrilateral\nThis will return the \&quot;toString\&quot; result&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_setPointA", "name": "Maths\\Geometry\\Quadrilateral::setPointA", "doc": "&quot;Define point A of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getPointA", "name": "Maths\\Geometry\\Quadrilateral::getPointA", "doc": "&quot;Get the A point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_setPointB", "name": "Maths\\Geometry\\Quadrilateral::setPointB", "doc": "&quot;Define point B of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getPointB", "name": "Maths\\Geometry\\Quadrilateral::getPointB", "doc": "&quot;Get the B point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_setPointC", "name": "Maths\\Geometry\\Quadrilateral::setPointC", "doc": "&quot;Define point C of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getPointC", "name": "Maths\\Geometry\\Quadrilateral::getPointC", "doc": "&quot;Get the C point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_setPointD", "name": "Maths\\Geometry\\Quadrilateral::setPointD", "doc": "&quot;Define point D of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getPointD", "name": "Maths\\Geometry\\Quadrilateral::getPointD", "doc": "&quot;Get the D point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentAB", "name": "Maths\\Geometry\\Quadrilateral::getSegmentAB", "doc": "&quot;Get the [A-&gt;B] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentBC", "name": "Maths\\Geometry\\Quadrilateral::getSegmentBC", "doc": "&quot;Get the [B-&gt;C] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentCD", "name": "Maths\\Geometry\\Quadrilateral::getSegmentCD", "doc": "&quot;Get the [C-&gt;D] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentDA", "name": "Maths\\Geometry\\Quadrilateral::getSegmentDA", "doc": "&quot;Get the [D-&gt;A] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentAC", "name": "Maths\\Geometry\\Quadrilateral::getSegmentAC", "doc": "&quot;Get the [A-&gt;C] diagonal segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSegmentBD", "name": "Maths\\Geometry\\Quadrilateral::getSegmentBD", "doc": "&quot;Get the [B-&gt;D] diagonal segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getFirstDiagonal", "name": "Maths\\Geometry\\Quadrilateral::getFirstDiagonal", "doc": "&quot;Get the [A-&gt;C] diagonal as a Segment with a positive direction(s)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_getSecondDiagonal", "name": "Maths\\Geometry\\Quadrilateral::getSecondDiagonal", "doc": "&quot;Get the [B-&gt;D] diagonal as a Segment with a positive direction(s)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_isValidPoint", "name": "Maths\\Geometry\\Quadrilateral::isValidPoint", "doc": "&quot;Test if point A is part of one of quadrilateral&#039;s segments&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Quadrilateral", "fromLink": "Maths/Geometry/Quadrilateral.html", "link": "Maths/Geometry/Quadrilateral.html#method_isParallelogram", "name": "Maths\\Geometry\\Quadrilateral::isParallelogram", "doc": "&quot;Test if the quadrilateral is a parallelogram&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Rectangle.html", "name": "Maths\\Geometry\\Rectangle", "doc": "&quot;Class Rectangle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method___construct", "name": "Maths\\Geometry\\Rectangle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method_getWidth", "name": "Maths\\Geometry\\Rectangle::getWidth", "doc": "&quot;Get rectangle&#039;s width (by convention width &gt; height)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method_getHeight", "name": "Maths\\Geometry\\Rectangle::getHeight", "doc": "&quot;Get rectangle&#039;s height (by convention width &gt; height)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method_getArea", "name": "Maths\\Geometry\\Rectangle::getArea", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method_getPerimeter", "name": "Maths\\Geometry\\Rectangle::getPerimeter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Rectangle", "fromLink": "Maths/Geometry/Rectangle.html", "link": "Maths/Geometry/Rectangle.html#method_createFromCoordinates", "name": "Maths\\Geometry\\Rectangle::createFromCoordinates", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/RightTriangle.html", "name": "Maths\\Geometry\\RightTriangle", "doc": "&quot;Class Right Triangle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method___construct", "name": "Maths\\Geometry\\RightTriangle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_createFromWidthAndAlpha", "name": "Maths\\Geometry\\RightTriangle::createFromWidthAndAlpha", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_getAlpha", "name": "Maths\\Geometry\\RightTriangle::getAlpha", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_getBeta", "name": "Maths\\Geometry\\RightTriangle::getBeta", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_getHypotenuse", "name": "Maths\\Geometry\\RightTriangle::getHypotenuse", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_getArea", "name": "Maths\\Geometry\\RightTriangle::getArea", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method_getPerimeter", "name": "Maths\\Geometry\\RightTriangle::getPerimeter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\RightTriangle", "fromLink": "Maths/Geometry/RightTriangle.html", "link": "Maths/Geometry/RightTriangle.html#method___toString", "name": "Maths\\Geometry\\RightTriangle::__toString", "doc": "&quot;Write a line object as &lt;code&gt;[(Ax,Ay),(Bx,By),(Cx,Cy),(Dx,Dy)]&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Segment.html", "name": "Maths\\Geometry\\Segment", "doc": "&quot;Segment class : two points A -&gt; B&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Segment", "fromLink": "Maths/Geometry/Segment.html", "link": "Maths/Geometry/Segment.html#method___toString", "name": "Maths\\Geometry\\Segment::__toString", "doc": "&quot;Write a segment as &lt;code&gt;[(Ax,Ay),(Bx,By)]&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Segment", "fromLink": "Maths/Geometry/Segment.html", "link": "Maths/Geometry/Segment.html#method___equationToString", "name": "Maths\\Geometry\\Segment::__equationToString", "doc": "&quot;Write an algebraic function of the segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Segment", "fromLink": "Maths/Geometry/Segment.html", "link": "Maths/Geometry/Segment.html#method_getLength", "name": "Maths\\Geometry\\Segment::getLength", "doc": "&quot;Get the length of the segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Segment", "fromLink": "Maths/Geometry/Segment.html", "link": "Maths/Geometry/Segment.html#method_getCenter", "name": "Maths\\Geometry\\Segment::getCenter", "doc": "&quot;Get the middle of the segment as a &lt;code&gt;\\Maths\\Geometry\\Point&lt;\/code&gt; object&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Triangle.html", "name": "Maths\\Geometry\\Triangle", "doc": "&quot;Class Triangle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method___construct", "name": "Maths\\Geometry\\Triangle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method___toString", "name": "Maths\\Geometry\\Triangle::__toString", "doc": "&quot;Write a circle like &lt;code&gt;[(Ax,Ay),(Bx,By),(Cx,Cy)]&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method___equationToString", "name": "Maths\\Geometry\\Triangle::__equationToString", "doc": "&quot;Write an algebraic function of the line&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_setPointA", "name": "Maths\\Geometry\\Triangle::setPointA", "doc": "&quot;Define point A of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getPointA", "name": "Maths\\Geometry\\Triangle::getPointA", "doc": "&quot;Get the A point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_setPointB", "name": "Maths\\Geometry\\Triangle::setPointB", "doc": "&quot;Define point B of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getPointB", "name": "Maths\\Geometry\\Triangle::getPointB", "doc": "&quot;Get the B point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_setPointC", "name": "Maths\\Geometry\\Triangle::setPointC", "doc": "&quot;Define point C of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getPointC", "name": "Maths\\Geometry\\Triangle::getPointC", "doc": "&quot;Get the C point of the quadrilateral&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getSegmentAB", "name": "Maths\\Geometry\\Triangle::getSegmentAB", "doc": "&quot;Get the [A-&gt;B] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getSegmentBC", "name": "Maths\\Geometry\\Triangle::getSegmentBC", "doc": "&quot;Get the [B-&gt;C] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getSegmentCA", "name": "Maths\\Geometry\\Triangle::getSegmentCA", "doc": "&quot;Get the [C-&gt;A] segment&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getPerimeter", "name": "Maths\\Geometry\\Triangle::getPerimeter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_getArea", "name": "Maths\\Geometry\\Triangle::getArea", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_isValidPoint", "name": "Maths\\Geometry\\Triangle::isValidPoint", "doc": "&quot;Test if point A is in one of the triangle&#039;s segments&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_isEquilateral", "name": "Maths\\Geometry\\Triangle::isEquilateral", "doc": "&quot;Test if a triangle is equilateral : [AB] = [BC] = [CA]&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Triangle", "fromLink": "Maths/Geometry/Triangle.html", "link": "Maths/Geometry/Triangle.html#method_isIsoceles", "name": "Maths\\Geometry\\Triangle::isIsoceles", "doc": "&quot;Test if a triangle is equilateral : [AB] = [BC] OR [AB] = [CA] OR [BC] = [CA]&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/TriangleRectangle.html", "name": "Maths\\Geometry\\TriangleRectangle", "doc": "&quot;Class Rectangle&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method___construct", "name": "Maths\\Geometry\\TriangleRectangle::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_createFromWidthAndAlpha", "name": "Maths\\Geometry\\TriangleRectangle::createFromWidthAndAlpha", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_getAlpha", "name": "Maths\\Geometry\\TriangleRectangle::getAlpha", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_getBeta", "name": "Maths\\Geometry\\TriangleRectangle::getBeta", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_getHypotenuse", "name": "Maths\\Geometry\\TriangleRectangle::getHypotenuse", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_getArea", "name": "Maths\\Geometry\\TriangleRectangle::getArea", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method_getPerimeter", "name": "Maths\\Geometry\\TriangleRectangle::getPerimeter", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\TriangleRectangle", "fromLink": "Maths/Geometry/TriangleRectangle.html", "link": "Maths/Geometry/TriangleRectangle.html#method___toString", "name": "Maths\\Geometry\\TriangleRectangle::__toString", "doc": "&quot;Write a line object as &lt;code&gt;[(Ax,Ay),(Bx,By),(Cx,Cy),(Dx,Dy)]&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Geometry", "fromLink": "Maths/Geometry.html", "link": "Maths/Geometry/Vector.html", "name": "Maths\\Geometry\\Vector", "doc": "&quot;Basic Vector&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method___toString", "name": "Maths\\Geometry\\Vector::__toString", "doc": "&quot;Write a vector&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method___equationToString", "name": "Maths\\Geometry\\Vector::__equationToString", "doc": "&quot;Write a vector formula: &lt;code&gt;||~v|| = sqrt( x^2 + y^2 )&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_setOrigin", "name": "Maths\\Geometry\\Vector::setOrigin", "doc": "&quot;Define the origin of the vector (point A)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_getOrigin", "name": "Maths\\Geometry\\Vector::getOrigin", "doc": "&quot;Get the origin of the vector (point A)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_getDirection", "name": "Maths\\Geometry\\Vector::getDirection", "doc": "&quot;Get vector&#039;s direction&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_getMagnitude", "name": "Maths\\Geometry\\Vector::getMagnitude", "doc": "&quot;Get vector&#039;s magnitude (length)&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_isNull", "name": "Maths\\Geometry\\Vector::isNull", "doc": "&quot;Test if a vector is null : [~0] = [A==B]&quot;"},
                    {"type": "Method", "fromName": "Maths\\Geometry\\Vector", "fromLink": "Maths/Geometry/Vector.html", "link": "Maths/Geometry/Vector.html#method_createFromOrigin", "name": "Maths\\Geometry\\Vector::createFromOrigin", "doc": "&quot;Create a vector with one point from origin O like &lt;code&gt;[~ O-&amp;gt;A]&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Maths\\Helper", "fromLink": "Maths/Helper.html", "link": "Maths/Helper/JSXgraph.html", "name": "Maths\\Helper\\JSXgraph", "doc": "&quot;Helper class to use the JSXgraph javascript library to render mathematics forms&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method___construct", "name": "Maths\\Helper\\JSXgraph::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method___toString", "name": "Maths\\Helper\\JSXgraph::__toString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_setOptions", "name": "Maths\\Helper\\JSXgraph::setOptions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_getOptions", "name": "Maths\\Helper\\JSXgraph::getOptions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_getOptionsByPrefix", "name": "Maths\\Helper\\JSXgraph::getOptionsByPrefix", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_getOption", "name": "Maths\\Helper\\JSXgraph::getOption", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_resetOutput", "name": "Maths\\Helper\\JSXgraph::resetOutput", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_addOutput", "name": "Maths\\Helper\\JSXgraph::addOutput", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_getOutput", "name": "Maths\\Helper\\JSXgraph::getOutput", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_addPoint", "name": "Maths\\Helper\\JSXgraph::addPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_getPoint", "name": "Maths\\Helper\\JSXgraph::getPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_init", "name": "Maths\\Helper\\JSXgraph::init", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawBoard", "name": "Maths\\Helper\\JSXgraph::drawBoard", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawPoint", "name": "Maths\\Helper\\JSXgraph::drawPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawOrigin", "name": "Maths\\Helper\\JSXgraph::drawOrigin", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawHorizontalPoint", "name": "Maths\\Helper\\JSXgraph::drawHorizontalPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawVerticalPoint", "name": "Maths\\Helper\\JSXgraph::drawVerticalPoint", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawSegment", "name": "Maths\\Helper\\JSXgraph::drawSegment", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawQuadrilateral", "name": "Maths\\Helper\\JSXgraph::drawQuadrilateral", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_drawCircle", "name": "Maths\\Helper\\JSXgraph::drawCircle", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Helper\\JSXgraph", "fromLink": "Maths/Helper/JSXgraph.html", "link": "Maths/Helper/JSXgraph.html#method_demonstrateThales", "name": "Maths\\Helper\\JSXgraph::demonstrateThales", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Maths.html", "name": "Maths\\Maths", "doc": "&quot;Basic class Maths&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_coordinatesToString", "name": "Maths\\Maths::coordinatesToString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_segmentToString", "name": "Maths\\Maths::segmentToString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_polygonToString", "name": "Maths\\Maths::polygonToString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_areSameSpace", "name": "Maths\\Maths::areSameSpace", "doc": "&quot;Test if two points are in the same space type&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_areSamePoint", "name": "Maths\\Maths::areSamePoint", "doc": "&quot;Test if two points are in the same position&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_getLinesIntersection", "name": "Maths\\Maths::getLinesIntersection", "doc": "&quot;Get the intersection point between two lines&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_arePerpendiculars", "name": "Maths\\Maths::arePerpendiculars", "doc": "&quot;Test if two segments are perpendiculars&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_areParallels", "name": "Maths\\Maths::areParallels", "doc": "&quot;Test if two segments are parallels&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_getDirectionByPoints", "name": "Maths\\Maths::getDirectionByPoints", "doc": "&quot;Get the directions between two points for each axis&quot;"},
                    {"type": "Method", "fromName": "Maths\\Maths", "fromLink": "Maths/Maths.html", "link": "Maths/Maths.html#method_getDirectionByCoordinates", "name": "Maths\\Maths::getDirectionByCoordinates", "doc": "&quot;Get the directions between two points&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Point1D.html", "name": "Maths\\Point1D", "doc": "&quot;Basic 1D point&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Point1D", "fromLink": "Maths/Point1D.html", "link": "Maths/Point1D.html#method___construct", "name": "Maths\\Point1D::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point1D", "fromLink": "Maths/Point1D.html", "link": "Maths/Point1D.html#method___toString", "name": "Maths\\Point1D::__toString", "doc": "&quot;Write a 1D point as &lt;code&gt;( x )&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point1D", "fromLink": "Maths/Point1D.html", "link": "Maths/Point1D.html#method_setAbscissa", "name": "Maths\\Point1D::setAbscissa", "doc": "&quot;Define the abscissa value of the point&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point1D", "fromLink": "Maths/Point1D.html", "link": "Maths/Point1D.html#method_getAbscissa", "name": "Maths\\Point1D::getAbscissa", "doc": "&quot;Get the abscissa value of the point&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Point2D.html", "name": "Maths\\Point2D", "doc": "&quot;Basic 2D point&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Point2D", "fromLink": "Maths/Point2D.html", "link": "Maths/Point2D.html#method___construct", "name": "Maths\\Point2D::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point2D", "fromLink": "Maths/Point2D.html", "link": "Maths/Point2D.html#method___toString", "name": "Maths\\Point2D::__toString", "doc": "&quot;Write a 2D point as &lt;code&gt;( x , y )&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point2D", "fromLink": "Maths/Point2D.html", "link": "Maths/Point2D.html#method_setOrdinate", "name": "Maths\\Point2D::setOrdinate", "doc": "&quot;Define the ordinate value of the point&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point2D", "fromLink": "Maths/Point2D.html", "link": "Maths/Point2D.html#method_getOrdinate", "name": "Maths\\Point2D::getOrdinate", "doc": "&quot;Get the ordinate value of the point&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/Point3D.html", "name": "Maths\\Point3D", "doc": "&quot;Basic 3D point&quot;"},
                                                        {"type": "Method", "fromName": "Maths\\Point3D", "fromLink": "Maths/Point3D.html", "link": "Maths/Point3D.html#method___construct", "name": "Maths\\Point3D::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point3D", "fromLink": "Maths/Point3D.html", "link": "Maths/Point3D.html#method___toString", "name": "Maths\\Point3D::__toString", "doc": "&quot;Write a 3D point as &lt;code&gt;( x , y , z )&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point3D", "fromLink": "Maths/Point3D.html", "link": "Maths/Point3D.html#method_setApplicate", "name": "Maths\\Point3D::setApplicate", "doc": "&quot;Define the applicate value of the point&quot;"},
                    {"type": "Method", "fromName": "Maths\\Point3D", "fromLink": "Maths/Point3D.html", "link": "Maths/Point3D.html#method_getApplicate", "name": "Maths\\Point3D::getApplicate", "doc": "&quot;Get the applicate value of the point&quot;"},
            
            {"type": "Class", "fromName": "Maths", "fromLink": "Maths.html", "link": "Maths/PointInterface.html", "name": "Maths\\PointInterface", "doc": "&quot;The point interface&quot;"},
                    
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


