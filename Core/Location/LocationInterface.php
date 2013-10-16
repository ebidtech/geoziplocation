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

/**
 * Class LocationInterface
 * There is an abstract class Location to help you and avoid repeat some code.
 *
 */
interface LocationInterface
{
    /**
     * Returns location's id
     *
     * @return string
     */
    public function getId();

    /**
     * Returns location's name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns Latitude
     *
     * @return float
     */
    public function getLat();

    /**
     * Returns Longitude
     *
     * @return float
     */
    public function getLng();

    /**
     * Return sub location
     *
     * @return LocationInterface
     */
    public function getSubLocation();

    /**
     * Returns if this location has some sub location
     *
     * @return bool
     */
    public function hasSubLocation();

    /**
     * Returns type of location.
     * e.g. Zone, Region, County
     *
     * @return string
     */
    public function getType();

    /**
     * Returns Location's Repository
     *
     * @return LocationRepository
     */
    public function getRepository();
}
