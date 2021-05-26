<?php
/**
 * Region
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */
namespace EBT\GeoZipLocation\Translator\SE\Location;

use EBT\GeoZipLocation\Core\Location\Location;
use EBT\GeoZipLocation\Translator\SE\Repository\RegionRepository;

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
