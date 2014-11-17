<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\PL;

use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Poland
     */
    public function testGetLocationForZip()
    {
        $f = new TranslatorFactory();
        $plTranslator = $f->create('PL');
        $l = $plTranslator->getLocationForZip('62262');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('wielkopolskie', $l->getName());
        $this->assertEquals(15, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('okręg poznański', $l->getName());
        $this->assertEquals(7, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        /*Without Zero, just 4 didits*/
        $f = new TranslatorFactory();
        $plTranslator = $f->create('PL');
        $l = $plTranslator->getLocationForZip('9100');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('mazowieckie', $l->getName());
        $this->assertEquals(7, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('okręg warszawski', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        /*With slash */
        $f = new TranslatorFactory();
        $plTranslator = $f->create('PL');
        $l = $plTranslator->getLocationForZip('54-404');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('dolnośląskie', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('okręg wrocławskii', $l->getName());
        $this->assertEquals(6, $l->getId());

        $this->assertTrue($l->hasSubLocation());
    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $f = new TranslatorFactory();
        $plTranslator = $f->create('PL');
        $plTranslator->getLocationForZip('77500');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $plTranslator = $f->create('PL');
        $this->assertEquals('8425', $plTranslator->getSanitizeZipCode('08425'));
        $this->assertEquals(false, $plTranslator->getSanitizeZipCode('425'));
    }
}
