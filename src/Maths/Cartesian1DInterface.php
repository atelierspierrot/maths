<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/maths>
 */

namespace Maths;

/**
 * Basic 1D objects interface
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
interface Cartesian1DInterface
    extends CartesianInterface
{

    /**
     * Get the distance between the two points of the objects
     *
     * @return  mixed
     */
    public function getDistance();

}

// Endfile
