<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BE;

use EBT\GeoZipLocation\Core\TranslatorInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use EBT\GeoZipLocation\Translator\BE\Location\Region;
use EBT\GeoZipLocation\Translator\BE\Repository\AreaRepository;
use EBT\GeoZipLocation\Translator\BE\Repository\RegionRepository;
use EBT\GeoZipLocation\Translator\BE\Repository\ZoneRepository;
use EBT\GeoZipLocation\Translator\BE\Resources\Data\DatabaseBE;

/**
 * Class Translator
 */
class Translator implements TranslatorInterface
{
    const COUNTRY_CODE = 'BE';
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

        $this->map = DatabaseBE::$map;
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
        /*
         * In france the Zone Zip-code can be two or three digits if not found with two try with three
         * Example: Corse du sud (2A) == 200 && 201
         *          Guyane == 973
        */
        $partialZipCode = substr($zipCode, 0, 2);

        if (false !== $zipCode && isset($this->map[$partialZipCode])) {
            $area = $this->repo_area->getById($this->map[$partialZipCode][self::DATA_INDEX_AREA]);
            $zone = $this->repo_zone->getById($this->map[$partialZipCode][self::DATA_INDEX_ZONE]);
            $region = $this->repo_region->getById($this->map[$partialZipCode][self::DATA_INDEX_REGION]);
            $zone->setSubLocation($area);
            $region->setSubLocation($zone);
            return $region;
        } else {
            throw new ResourceNotFoundException(sprintf('Unable to find a region for \'%s\' zipcode', $zipCode));
        }
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

        $sanitizedZipCode = substr($zipCode, 0, 4);

        return $sanitizedZipCode;
    }
}
