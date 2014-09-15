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
 * Basic 3D objects interface
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
interface Cartesian3DInterface
    extends Cartesian2DInterface
{

    /**
     * Get the volume of the object
     *
     * @return  mixed
     */
    public function getVolume();

}

// Endfile
