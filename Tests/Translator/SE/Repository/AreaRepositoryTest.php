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
use EBT\GeoZipLocation\Translator\SE\Repository\AreaRepository;
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
        $r = new AreaRepository();
        $this->assertEquals('area', $r->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $r = new AreaRepository();
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\SE\Location\Area', $r->getAll());
    }
}
