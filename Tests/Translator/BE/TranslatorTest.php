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
        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('1000');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Brussels', $location->getName());
        $this->assertEquals(1, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Brussels', $location->getName());
        $this->assertEquals(1, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('area', $location->getType());
        $this->assertEquals('NA', $location->getName());
        $this->assertEquals(0, $location->getId());

        $this->assertFalse($location->hasSubLocation());

        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('6506');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Wallonie', $location->getName());
        $this->assertEquals(3, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Hainaut', $location->getName());
        $this->assertEquals(8, $location->getId());

        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('6506');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Wallonie', $location->getName());
        $this->assertEquals(3, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Hainaut', $location->getName());
        $this->assertEquals(8, $location->getId());


        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('3000');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Flandres', $location->getName());
        $this->assertEquals(2, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Vlaams-Brabant', $location->getName());
        $this->assertEquals(3, $location->getId());


        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('1305');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Wallonie', $location->getName());
        $this->assertEquals(3, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Brabant wallon', $location->getName());
        $this->assertEquals(7, $location->getId());


        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('6700');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('Wallonie', $location->getName());
        $this->assertEquals(3, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Luxembourg', $location->getName());
        $this->assertEquals(10, $location->getId());


        $this->assertTrue($location->hasSubLocation());
    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $location = $ptTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $transFac = new TranslatorFactory();
        $ptTranslator = $transFac->create('BE');
        $this->assertEquals('2808', $ptTranslator->getSanitizeZipCode('2808aaa'));
        $this->assertEquals(false, $ptTranslator->getSanitizeZipCode('123'));
    }
}
