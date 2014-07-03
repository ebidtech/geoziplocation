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
use EBT\GeoZipLocation\Translator\BE\Repository\ZoneRepository;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class ZoneRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * test to assert zone type
     */
    public function testGetType()
    {
        $r = new ZoneRepository();
        $this->assertEquals('zone', $r->getType());
    }

    /**
     * test to get all values
     */
    public function testGetAll()
    {
        $r = new ZoneRepository();
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\BE\Location\Zone', $r->getAll());

    }
}
