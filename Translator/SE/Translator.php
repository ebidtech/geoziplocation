<?php
/**
 * Translator
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */
namespace EBT\GeoZipLocation\Translator\SE;

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\SE\Repository\AreaRepository;
use EBT\GeoZipLocation\Translator\SE\Repository\RegionRepository;
use EBT\GeoZipLocation\Translator\SE\Repository\ZoneRepository;
use EBT\GeoZipLocation\Translator\SE\Resources\Data\DatabaseSE;

/**
 * Class Translator
 */
class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'SE';
    const DATA_INDEX_AREA = 'area_id';
    const DATA_INDEX_ZONE = 'zone_id';
    const DATA_INDEX_REGION = 'region_id';

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
     * @var array map
     */
    protected $map;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->repo_area = new AreaRepository();
        $this->repo_zone = new ZoneRepository();
        $this->repo_region = new RegionRepository();

        $this->map = DatabaseSE::$map;
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
     *
     * @throws \EBT\GeoZipLocation\Exception\ResourceNotFoundException*
     */
    public function getLocationForZip($zipCode)
    {
        $zipCode = $this->getSanitizeZipCode($zipCode);

        if (false === $zipCode || ! isset($this->map[$zipCode])) {
            throw new ResourceNotFoundException(sprintf('Unable to find a region for %s zipcode', $zipCode));
        }

        $area = $this->repo_area->getById($this->map[$zipCode][self::DATA_INDEX_AREA]);
        $zone = $this->repo_zone->getById($this->map[$zipCode][self::DATA_INDEX_ZONE]);
        $region = $this->repo_region->getById($this->map[$zipCode][self::DATA_INDEX_REGION]);
        $zone->setSubLocation($area);
        $region->setSubLocation($zone);
        
        return $region;
    }

    /**
     * Returns current's translator country code
     *
     * @param string $zipCode
     *
     * @return string|false Valid Zip code or False if it's impossible to sanitize
     */
    public function getSanitizeZipCode($zipCode)
    {
        $zipCode = str_replace(' ', '', $zipCode);
        if (!is_string($zipCode) || strlen($zipCode) < 5) {
            return false;
        }

        $sanitizedZipCode = substr($zipCode, 0, 5);

        return filter_var($sanitizedZipCode, FILTER_VALIDATE_INT) ? $sanitizedZipCode : false;
    }
}
