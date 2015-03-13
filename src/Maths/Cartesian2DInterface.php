<?php
/**
 * This file is part of the Maths package.
 *
 * Copyright (c) 2014-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/maths>.
 */

namespace Maths;

/**
 * Basic 2D objects interface
 *
 * @author  piwi <me@e-piwi.fr>
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
