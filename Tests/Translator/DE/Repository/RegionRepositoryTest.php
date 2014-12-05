<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\DE\Repository;

use EBT\GeoZipLocation\Translator\DE\Repository\RegionRepository;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class RegionRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetType
     */
    public function testGetType()
    {
        $regionRepository = new RegionRepository();
        $this->assertEquals('region', $regionRepository->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $regionRepository = new RegionRepository();
        $this->assertContainsOnlyInstancesOf(
            'EBT\GeoZipLocation\Translator\DE\Location\Region',
            $regionRepository->getAll()
        );
    }
}
