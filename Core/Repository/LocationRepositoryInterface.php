<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Core\Repository;

use EBT\GeoZipLocation\Exception\ResourceNotFoundException;

/**
 * Class LocationRepositoryInterface
 * There is an abstract class LocationRepository to help you and avoid repeat some code.
 */
interface LocationRepositoryInterface
{
    /**
     * Returns all locations of this type
     *
     * @return LocationInterface[]
     */
    public function getAll();

    /**
     * Returns type of location handled by this repository
     *
     * @return string
     */
    public function getType();

    /**
     * Returns a Location for given id
     *
     * @param $id
     *
     * @return LocationInterface
     *
     * @throws ResourceNotFoundException
     */
    public function getById($id);
}
