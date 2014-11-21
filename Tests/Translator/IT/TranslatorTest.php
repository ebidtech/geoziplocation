<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\IT;

use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Italy
     */
    public function testGetLocationForZip()
    {
        /* A simple test */
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('IT');
        $l = $ptTranslator->getLocationForZip('23821');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Lombardia', $l->getName());
        $this->assertEquals(9, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('LC - Lecco', $l->getName());
        $this->assertEquals(42, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('ABBADIA LARIANA', $l->getName());
        $this->assertEquals(8, $l->getId());

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
        $itTranslator = $f->create('IT');
        $itTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $itTranslator = $f->create('IT');
        $this->assertEquals('00041', $itTranslator->getSanitizeZipCode('41'));
        $this->assertEquals(false, $itTranslator->getSanitizeZipCode('123456'));
    }
}
