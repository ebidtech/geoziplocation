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


namespace EBT\GeoZipLocation\Tests\Translator\SE\Repository;

use EBT\GeoZipLocation\Core\TranslatorFactory;
use EBT\GeoZipLocation\Translator\SE\Repository\RegionRepository;
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
        $r = new RegionRepository();
        $this->assertEquals('region', $r->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $r = new RegionRepository();
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\SE\Location\Region', $r->getAll());
    }
}
