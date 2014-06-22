<?php
/**
 * Some PHP classes to do mathematics
 * Copyleft (c) 2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/maths>
 */

namespace Maths;

use \Maths\PointInterface;

/**
 * Basic geometric objects interface
 *
 * @author  PieroWbmstr (me [at] e-piwi [dot] fr)
 */
interface CartesianInterface
{

    /**
     * Test if point A is part of the object
     *
     * @param   \Maths\PointInterface   $a
     * @return  bool
     */
    public function isValidPoint(PointInterface $a);

}

// Endfile
