<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Core;

use EBT\GeoZipLocation\Core\LocationInterface;
use EBT\GeoZipLocation\Exception\ResourceNotFoundException;

interface TranslatorInterface
{
    /**
     * Returns the location for given zip code
     *
     * @param string $zipCode
     *
     * @return LocationInterface
     *
     * @throws ResourceNotFoundException
     */
    public function getLocationForZip($zipCode);

    /**
     * Returns current's translator country code
     *
     * @return string
     */
    public function getCountryCode();
}
