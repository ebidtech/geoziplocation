<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\BR;

use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for Brazil
     */
    public function testGetLocationForZip()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BR');
        $l = $ptTranslator->getLocationForZip('87215-123');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Estado de Paraná', $l->getName());
        $this->assertEquals(29, $l->getId());

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
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

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
        $ptTranslator = $f->create('BR');
        $l = $ptTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('BR');
        $this->assertEquals('87215', $ptTranslator->getSanitizeZipCode('87215-123'));
        $this->assertEquals(false, $ptTranslator->getSanitizeZipCode('1234'));
    }
}
