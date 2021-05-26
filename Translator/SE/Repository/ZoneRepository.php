<?php
/**
 * ZoneRepository
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */
namespace EBT\GeoZipLocation\Translator\SE\Repository;

use EBT\GeoZipLocation\Core\Repository\LocationRepository;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\SE\Location\Zone;
use EBT\GeoZipLocation\Translator\SE\Resources\Data\DatabaseSE;

/**
 * Class ZoneRepository
 */
class ZoneRepository extends LocationRepository
{
    const LOCATION_TYPE = 'zone';

    /**
     * @var array map
     */
    protected $map;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->map = DatabaseSE::$zones;
    }

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
     * @return Zone[]
     */
    public function getAll()
    {
        $results = [];
        foreach ($this->map as $id => $name) {
            $results[] = new Zone($this, $id, $this->map[$id]);
        }
        return $results;
    }

    /**
     * Returns a Location for given id
     *
     * @param $id
     *
     * @return Zone
     *
     * @throws ResourceNotFoundException
     */
    public function getById($id)
    {
        if (isset($this->map[$id])) {

            return new Zone($this, $id, $this->map[$id]);
        } else {
            throw new ResourceNotFoundException(sprintf('Unable to find Zone for given id: %s.', $id));
        }
    }
}
