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

namespace EBT\GeoZipLocation\Tests\Translator\SE;

use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Sweden
     */
    public function testGetLocationForZip()
    {
        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $l = $seTranslator->getLocationForZip('18603');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Stockholm', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Vallentuna', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('Brottby', $l->getName());
        $this->assertEquals(2, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $l = $seTranslator->getLocationForZip('57060');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Östergötland', $l->getName());
        $this->assertEquals(6, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Boxholm', $l->getName());
        $this->assertEquals(69, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('Österbymo', $l->getName());
        $this->assertEquals(505, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $l = $seTranslator->getLocationForZip('77220');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('Grängesberg', $l->getName());
        $this->assertEquals(1710, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $l = $seTranslator->getLocationForZip('19502');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Stockholm', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Stockholm', $l->getName());
        $this->assertEquals(14, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('Märsta', $l->getName());
        $this->assertEquals(165, $l->getId());

        $this->assertFalse($l->hasSubLocation());
    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $l = $seTranslator->getLocationForZip('00000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $seTranslator = $f->create('SE');
        $this->assertEquals('19557', $seTranslator->getSanitizeZipCode('195 57'));
        $this->assertEquals(false, $seTranslator->getSanitizeZipCode('1234'));
    }
}
