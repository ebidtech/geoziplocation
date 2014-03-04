<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BR\Repository;

use EBT\GeoZipLocation\Core\Repository\LocationRepository;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\BR\Location\Region;
use EBT\GeoZipLocation\Translator\BR\Resources\Data\DatabaseBR;

/**
 * Class RegionRepository
 */
class RegionRepository extends LocationRepository
{
    const LOCATION_TYPE = 'region';

    /**
     * @var array map
     */
    protected $map;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->map = DatabaseBR::$regions;
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
     * @return Region[]
     */
    public function getAll()
    {
        $results = array();
        foreach ($this->map as $id => $name) {
            $results[] = new Region($this, $id, $this->map[$id]);
        }
        return $results;
    }

    /**
     * Returns a Location for given id
     *
     * @param $id
     *
     * @return Region
     *
     * @throws ResourceNotFoundException
     */
    public function getById($id)
    {
        if (isset($this->map[$id])) {

            return new Region($this, $id, $this->map[$id]);
        } else {
            throw new ResourceNotFoundException(sprintf('Unable to find Region for given id: %s.', $id));
        }
    }
}
