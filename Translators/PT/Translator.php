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

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Translators\PT\Zone;
use EBT\GeoZipLocation\Translators\PT\Region;

class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'PT';

    /**
     * @var AreaRepository
     */
    protected $repo_area;

    /**
     * @var ZoneRepository
     */
    protected $repo_zone;

    /**
     * @var RegionRepository
     */
    protected $repo_region;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->repo_area = new AreaRepository();
        $this->repo_zone = new ZoneRepository();
        $this->repo_region = new RegionRepository();
    }

    /**
     * Returns current's translator country code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return self::COUNTRY_CODE;
    }

    /**
     * Returns the location for given zip code
     *
     * @param string $zipCode
     *
     * @return Region
     */
    public function getLocationForZip($zipCode)
    {
        $region = new Region($this->repo_region, 1, 'regionX');
        $location = new Zone($this->repo_zone, 2, 'locationX');
        $region->setSubLocation($location);

        return $region;
    }
}