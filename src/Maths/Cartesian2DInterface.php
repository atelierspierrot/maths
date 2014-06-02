<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/maths>
 */

namespace Maths;

/**
 * Basic 2D objects interface
 *
 * @author  PieroWbmstr (me [at] picas [dot] fr)
 */
interface Cartesian2DInterface
    extends Cartesian1DInterface
{

    /**
     * Get the area of the object
     *
     * @return  mixed
     */
    public function getArea();

    /**
     * Get the perimeter of the object
     *
     * @return  mixed
     */
    public function getPerimeter();

}

// Endfile
