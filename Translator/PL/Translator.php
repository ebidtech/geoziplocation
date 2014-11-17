<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\PL;

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Exception\TranslatorNotFoundException;
use EBT\GeoZipLocation\Translator\PL\Location\Region;
use EBT\GeoZipLocation\Translator\PL\Repository\AreaRepository;
use EBT\GeoZipLocation\Translator\PL\Repository\RegionRepository;
use EBT\GeoZipLocation\Translator\PL\Repository\ZoneRepository;
use EBT\GeoZipLocation\Translator\PL\Resources\Data\DatabasePL;

/**
 * Class Translator
 */
class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'PL';
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

        $this->map = DatabasePL::$map;
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
         * Polish zone/region could easily be computed by the first, second or the third digit(s) of the zip code. To
         * achieve that we will try to find one match on array map by exactly this order.
         */

        for ($substrSize = 1; $substrSize <=5; $substrSize++) {
            $searchPattern = substr($zipCode, 0, $substrSize);
            if (isset($this->map[$searchPattern])) {
                $area = $this->repo_area->getById($this->map[$searchPattern][self::DATA_INDEX_AREA]);
                $zone = $this->repo_zone->getById($this->map[$searchPattern][self::DATA_INDEX_ZONE]);
                $region = $this->repo_region->getById($this->map[$searchPattern][self::DATA_INDEX_REGION]);
                $zone->setSubLocation($area);
                $region->setSubLocation($zone);
                return $region;
            }
        }

        /* If we reach this point then no region was found. throwing an error */
        throw new ResourceNotFoundException(sprintf('Unable to find a region for \'%s\' zipcode', $zipCode));
    }

    /**
     * Returns current's translator country code
     * Because there are many zip Code with jutt 4 digits, for example: 2120 this is transformed to 02120
     *
     * @param string $zipCode
     *
     * @return string|false Valid Zip code or False if it's impossible to sanitize
     */
    public function getSanitizeZipCode($zipCode)
    {
        if (!is_string($zipCode) || strlen($zipCode) < 4) {
            return false;
        }

        /* let me remove all spaces and slashes from the zip code */
        $sanitizedZipCode = substr(trim($zipCode, " -"), 0, 5);

        /* If we have only 4 digits, lets complete the zip code with an extra 0 to the left */
        if (strlen($sanitizedZipCode) == 4) {
            $sanitizedZipCode = "0" . $sanitizedZipCode;
        }

        return $sanitizedZipCode;
    }
}
