<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Core;

use EBT\GeoZipLocation\Core\TranslatorFactory;
use PHPUnit_Framework_TestCase;

/**
 * Class TranslatorFactoryTest
 */
class TranslatorFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreatePT()
    {
//        $cTranslator = $this->getMock('EBT\GeoZipLocation\Core\TranslatorInterface');
//        $cTranslator->expects($this->once())
//            ->method('getCountryCode')
//            ->will($this->returnValue('PT'));
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('PT');
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\TranslatorInterface', $ptTranslator);

        $l = $ptTranslator->getLocationForZip('4480-460');
        echo $l->getType();
        echo $l->getName();
        echo $l->getId();
    }
}
