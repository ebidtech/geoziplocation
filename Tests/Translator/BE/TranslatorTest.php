<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\BE;

use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Portugal
     */
    public function testGetLocationForZip()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('1000');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Brussels', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Brussels', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('6506');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Flandres', $l->getName());
        $this->assertEquals(3, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Hainaut', $l->getName());
        $this->assertEquals(8, $l->getId());

        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('6506');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Flandres', $l->getName());
        $this->assertEquals(3, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Hainaut', $l->getName());
        $this->assertEquals(8, $l->getId());


        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('3000');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Wallonie', $l->getName());
        $this->assertEquals(2, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Vlaams-Brabant', $l->getName());
        $this->assertEquals(3, $l->getId());


        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('1305');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Flandres', $l->getName());
        $this->assertEquals(3, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Brabant wallon', $l->getName());
        $this->assertEquals(7, $l->getId());


        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('6700');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Flandres', $l->getName());
        $this->assertEquals(3, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Luxembourg', $l->getName());
        $this->assertEquals(10, $l->getId());


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
        $ptTranslator = $f->create('BE');
        $l = $ptTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BE');
        $this->assertEquals('2808', $ptTranslator->getSanitizeZipCode('2808aaa'));
        $this->assertEquals(false, $ptTranslator->getSanitizeZipCode('123'));
    }
}
