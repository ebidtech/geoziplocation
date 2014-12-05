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

use EBT\GeoZipLocation\Translator\DE\Repository\AreaRepository;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class AreaRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetType
     */
    public function testGetType()
    {
        $areaRepository = new AreaRepository();
        $this->assertEquals('area', $areaRepository->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $areaRepository = new AreaRepository();
        $this->assertContainsOnlyInstancesOf(
            'EBT\GeoZipLocation\Translator\DE\Location\Area',
            $areaRepository->getAll()
        );
    }
}
