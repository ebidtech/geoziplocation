<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\DE;

use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Germany
     */
    public function testGetLocationForZip()
    {
        /* Testing a simple zip code */
        $translatorFactory = new TranslatorFactory();
        $deTranslator = $translatorFactory->create('DE');
        $location = $deTranslator->getLocationForZip('57612');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('NA', $location->getName());
        $this->assertEquals(0, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Rhineland-Palatinate', $location->getName());
        $this->assertEquals(11, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('area', $location->getType());
        $this->assertEquals('Volkerzen', $location->getName());
        $this->assertEquals(2822, $location->getId());

        $this->assertFalse($location->hasSubLocation());

        /* Testing a zip code on an interval */
        $translatorFactory = new TranslatorFactory();
        $deTranslator = $translatorFactory->create('DE');
        $location = $deTranslator->getLocationForZip('14000');
        $this->assertEquals('region', $location->getType());
        $this->assertEquals('NA', $location->getName());
        $this->assertEquals(0, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('zone', $location->getType());
        $this->assertEquals('Berlin', $location->getName());
        $this->assertEquals(3, $location->getId());

        $this->assertTrue($location->hasSubLocation());

        $location = $location->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $location);
        $this->assertEquals('area', $location->getType());
        $this->assertEquals('Berlin', $location->getName());
        $this->assertEquals(309, $location->getId());

        $this->assertFalse($location->hasSubLocation());
    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $translatorFactory = new TranslatorFactory();
        $deTranslator = $translatorFactory->create('DE');
        $deTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $translatorFactory = new TranslatorFactory();
        $deTranslator = $translatorFactory->create('DE');
        $this->assertEquals('01900', $deTranslator->getSanitizeZipCode('1900'));
        $this->assertEquals(false, $deTranslator->getSanitizeZipCode('123'));
        $this->assertEquals(false, $deTranslator->getSanitizeZipCode('123456'));
    }
}
