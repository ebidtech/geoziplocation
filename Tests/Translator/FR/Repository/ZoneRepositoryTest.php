<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\FR\Repository;

use EBT\GeoZipLocation\Core\TranslatorFactory;
use EBT\GeoZipLocation\Translator\FR\Repository\ZoneRepository;
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
        $r = new ZoneRepository();
        $this->assertEquals('zone', $r->getType());
    }

    /**
     * testGetAll
     */
    public function testGetAll()
    {
        $r = new ZoneRepository();
        $this->assertContainsOnlyInstancesOf('EBT\GeoZipLocation\Translator\FR\Location\Zone', $r->getAll());

    }
}
