<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\ES;

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
        $ptTranslator = $f->create('ES');
        $l = $ptTranslator->getLocationForZip('28008');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Madrid', $l->getName());
        $this->assertEquals(14, $l->getId());

        $this->assertTrue($l->hasSubLocation());
//
//        $l = $l->getSubLocation();
//        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
//        $this->assertEquals('zone', $l->getType());
//        $this->assertEquals('Braga', $l->getName());
//        $this->assertEquals(3, $l->getId());
//
//        $this->assertTrue($l->hasSubLocation());
//
//        $l = $l->getSubLocation();
//        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
//        $this->assertEquals('area', $l->getType());
//        $this->assertEquals('Vila Verde', $l->getName());
//        $this->assertEquals(313, $l->getId());
//
//        $this->assertFalse($l->hasSubLocation());
    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('ES');
        $l = $ptTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('ES');
        $this->assertEquals('28008', $ptTranslator->getSanitizeZipCode('28008aaa'));
        $this->assertEquals(false, $ptTranslator->getSanitizeZipCode('1234'));
    }
}
