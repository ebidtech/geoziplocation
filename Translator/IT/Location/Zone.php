<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\IT\Location;

use EBT\GeoZipLocation\Core\Location\Location;
use EBT\GeoZipLocation\Core\Repository\LocationRepositoryInterface;

class Zone extends Location
{
    const LOCATION_TYPE = 'zone';

    /**
     * Returns Location's Repository
     *
     * @return LocationRepositoryInterface
     */
    public function getRepository()
    {
        return $this->repo;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return self::LOCATION_TYPE;
    }
}
