<?php
/*
 * Represents "Estado"
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BR\Location;

use EBT\GeoZipLocation\Core\Location\Location;
use EBT\GeoZipLocation\Translator\BR\Repository\RegionRepository;

class Region extends Location
{
    const LOCATION_TYPE = 'region';

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
