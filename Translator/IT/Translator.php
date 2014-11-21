<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\IT;

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Exception\TranslatorNotFoundException;
use EBT\GeoZipLocation\Translator\IT\Location\Region;
use EBT\GeoZipLocation\Translator\IT\Repository\AreaRepository;
use EBT\GeoZipLocation\Translator\IT\Repository\RegionRepository;
use EBT\GeoZipLocation\Translator\IT\Repository\ZoneRepository;
use EBT\GeoZipLocation\Translator\IT\Resources\Data\DatabaseIT;

/**
 * Class Translator
 */
class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'IT';
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

        $this->map = DatabaseIT::$map;
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
     * @throws \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function getLocationForZip($zipCode)
    {

        $zipCode = $this->getSanitizeZipCode($zipCode);

        if (!$zipCode) {
            throw new TranslatorNotFoundException(sprintf('Zip code \'%s\' is not valid!', $zipCode));
        }

        /*
         * Italian has a mapping one to one (zipcodee => geolocation), so, we just need to verify if
         * the zipcode exists on the mapping. Otherwise we throw an excption
         */
        if (isset($this->map[$zipCode])) {
            $area = $this->repo_area->getById($this->map[$zipCode][self::DATA_INDEX_AREA]);
            $zone = $this->repo_zone->getById($this->map[$zipCode][self::DATA_INDEX_ZONE]);
            $region = $this->repo_region->getById($this->map[$zipCode][self::DATA_INDEX_REGION]);
            $zone->setSubLocation($area);
            $region->setSubLocation($zone);
            return $region;
        }

        /* If we reach this point then no region was found. throwing an error */
        throw new ResourceNotFoundException(sprintf('Unable to find a region for \'%s\' zipcode', $zipCode));
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
        $zipCode = trim($zipCode);
        $zipCodeLen = strlen($zipCode);
        if (!is_string($zipCode) || $zipCodeLen > 5) {
            return false;
        }

        return str_repeat('0', 5 - $zipCodeLen) . $zipCode;
    }
}
