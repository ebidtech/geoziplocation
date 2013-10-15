<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translators\PT;

use EBT\GeoZipLocation\Core\Location;
use EBT\GeoZipLocation\Core\LocationRepository;

class ZoneRepository extends  LocationRepository
{
    const LOCATION_TYPE = 'zone';

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return self::LOCATION_TYPE;
    }

    /**
     * Returns all locations of this type
     *
     * @return Location[]
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }
}
