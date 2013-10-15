<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Core;

interface LocationRepositoryInterface
{
    /**
     * Returns all locations of this type
     *
     * @return Location[]
     */
    public function getAll();

    /**
     * Returns type of location handled by this repository
     *
     * @return string
     */
    public function getType();
}
