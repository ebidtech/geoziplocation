<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\BE\Repository;

use EBT\GeoZipLocation\Core\TranslatorFactory;
use EBT\GeoZipLocation\Translator\BE\Repository\AreaRepository;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class AreaRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * test to assert area type
     */
    public function testGetType()
    {
        $r = new AreaRepository();
        $this->assertEquals('area', $r->getType());
    }

    /**
     * test to get all values
     */
    public function testGetAll()
    {
        $r = new AreaRepository();
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\BE\Location\Area', $r->getAll());
    }
}
