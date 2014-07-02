<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BE\Repository;

use EBT\GeoZipLocation\Core\Location\LocationInterface;
use EBT\GeoZipLocation\Core\Repository\LocationRepository;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\BE\Location\Area;
use EBT\GeoZipLocation\Translator\BE\Resources\Data\DatabaseBE;

/**
 * Class AreaRepository
 */
class AreaRepository extends LocationRepository
{
    const LOCATION_TYPE = 'area';

    /**
     * @var array map
     */
    protected $map;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->map = DatabaseBE::$areas;
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
     * @return Area[]
     */
    public function getAll()
    {
        $results = array();
        foreach ($this->map as $id => $name) {
            $results[] = new Area($this, $id, $this->map[$id]);
        }
        return $results;
    }

    /**
     * Returns a Location for given id
     *
     * @param $id
     *
     * @return LocationInterface
     *
     * @throws ResourceNotFoundException
     */
    public function getById($id)
    {
        if (isset($this->map[$id])) {

            return new Area($this, $id, $this->map[$id]);
        } else {
            throw new ResourceNotFoundException(sprintf('Unable to find Area for given id: %s.', $id));
        }
    }
}
