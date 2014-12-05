<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\DE;

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\DE\Location\Region;
use EBT\GeoZipLocation\Translator\DE\Repository\AreaRepository;
use EBT\GeoZipLocation\Translator\DE\Repository\RegionRepository;
use EBT\GeoZipLocation\Translator\DE\Repository\ZoneRepository;
use EBT\GeoZipLocation\Translator\DE\Resources\Data\DatabaseDE;

/**
 * Class Translator
 */
class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'DE';
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

        $this->map = DatabaseDE::$map;
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

        if (false === $zipCode) {
            throw new ResourceNotFoundException(sprintf('Unable to find a region for %s zipcode', $zipCode));
        }

        /* Germany zip codes  are tricky, we have to
         *  1) search one by one
         *  2) if step 1) fails, we have to look in the intervals :o
         */
        foreach ($this->map as $mapZipCode => $zipCodeContent) {
            /* Is map zip code was 5 digits, then we shall compare with our zip code */
            if (strlen($mapZipCode) == 5) {
                if ($zipCode == $mapZipCode) {
                    $area = $this->repo_area->getById($zipCodeContent[self::DATA_INDEX_AREA]);
                    $zone = $this->repo_zone->getById($zipCodeContent[self::DATA_INDEX_ZONE]);
                    $region = $this->repo_region->getById($zipCodeContent[self::DATA_INDEX_REGION]);
                    $zone->setSubLocation($area);
                    $region->setSubLocation($zone);
                    return $region;
                }
            /* otherwise, it was an interval and we have to check if our zip code is on the interval */
            } else {
                $zipCodeInterval = explode('-', $mapZipCode);

                if ($zipCode > $zipCodeInterval[0] && $zipCode < $zipCodeInterval[1]) {
                    $area = $this->repo_area->getById($zipCodeContent[self::DATA_INDEX_AREA]);
                    $zone = $this->repo_zone->getById($zipCodeContent[self::DATA_INDEX_ZONE]);
                    $region = $this->repo_region->getById($zipCodeContent[self::DATA_INDEX_REGION]);
                    $zone->setSubLocation($area);
                    $region->setSubLocation($zone);
                    return $region;
                }
            }
        }

        throw new ResourceNotFoundException(sprintf('Unable to find a region for %s zipcode', $zipCode));
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
        if (!is_string($zipCode) || $zipCodeLen > 5 || $zipCodeLen < 4) {
            return false;
        }

        return str_repeat('0', 5 - $zipCodeLen) . $zipCode;
    }
}
