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

use EBT\GeoZipLocation\Translator\DE\Repository\ZoneRepository;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class ZoneRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetType
     */
    public function testGetType()
    {
        $zoneRepository = new ZoneRepository();
        $this->assertEquals('zone', $zoneRepository->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $zoneRepository = new ZoneRepository();
        $this->assertContainsOnlyInstancesOf(
            'EBT\GeoZipLocation\Translator\DE\Location\Zone',
            $zoneRepository->getAll()
        );

    }
}
