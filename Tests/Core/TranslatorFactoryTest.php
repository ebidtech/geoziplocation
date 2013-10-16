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
    /**
     * testCreatePT
     */
    public function testCreatePT()
    {
        $f = new TranslatorFactory();
        $ptTranslator = $f->create('PT');
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\TranslatorInterface', $ptTranslator);
    }
}
