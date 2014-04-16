<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\BR\Repository;

use EBT\GeoZipLocation\Core\TranslatorFactory;
use EBT\GeoZipLocation\Translator\BR\Repository\AreaRepository;
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
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\BR\Location\Area', $r->getAll());
    }
}
