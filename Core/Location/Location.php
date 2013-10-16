<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Core\Location;

use EBT\GeoZipLocation\Core\Repository\LocationRepositoryInterface;

/**
 * Class Location
 * One just needs to implement LocationInterface however one can extend this class in order to avoid repeat code
 *
 */
abstract class Location implements LocationInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Location
     */
    protected $subLocation;

    /**
     * @var float
     */
    protected $lat;

    /**
     * @var float
     */
    protected $lng;

    /**
     * @var LocationRepositoryInterface
     */
    protected $repo;

    /**
     * Constructor
     *
     * @param LocationRepositoryInterface $repo
     * @param string $id
     * @param string $name
     */
    public function __construct(LocationRepositoryInterface $repo, $id = null, $name = null)
    {
        $this->repo = $repo;
        $this->setId($id);
        $this->setName($name);
    }

    /**
     * Returns location's id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets location's id
     *
     * @param string $id
     *
     * @return Location
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Returns location's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets location's name
     *
     * @param string $name
     *
     * @return Location
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Return sub location
     *
     * @return LocationInterface
     */
    public function getSubLocation()
    {
        return $this->subLocation;
    }

    /**
     * Returns if this location has some sub location
     *
     * @return bool
     */
    public function hasSubLocation()
    {
        if ($this->subLocation instanceof Location) {
            return true;
        }
        return false;
    }

    /**
     * Sets sub location
     *
     * @param LocationInterface $subLocation
     *
     * @return Location
     */
    public function setSubLocation(LocationInterface $subLocation)
    {
        $this->subLocation = $subLocation;
        return $this;
    }

    /**
     * Sets Latitude
     *
     * @param float $lat
     *
     * @return Location
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Sets Longitude
     *
     * @param float $lng
     *
     * @return Location
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Returns Latitude
     *
     * @return Location
     */
    public function getLat()
    {
        $this->lat;
    }

    /**
     * Returns Longitude
     *
     * @return float
     */
    public function getLng()
    {
        $this->lng;
    }

    /**
     * Returns Location's Repository
     *
     * @return LocationRepositoryInterface
     */
    abstract  public function getRepository();
//    {
//        return $this->repo;
//    }

    /**
     * Returns type of this location.
     * e.g. Zone, Region, Area
     *
     * @return string
     */
    abstract public function getType();


}
