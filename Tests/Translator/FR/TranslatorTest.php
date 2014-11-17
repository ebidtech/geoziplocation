<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\GeoZipLocation\Tests\Translator\FR;

use EBT\GeoZipLocation\Exception\ResourceNotFoundException;
use PHPUnit_Framework_TestCase;
use EBT\GeoZipLocation\Core\TranslatorFactory;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * testGetLocationForZip for France
     */
    public function testGetLocationForZip()
    {
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('67100');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Alsace', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Bas-Rhin', $l->getName());
        $this->assertEquals(1, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('area', $l->getType());
        $this->assertEquals('NA', $l->getName());
        $this->assertEquals(0, $l->getId());

        $this->assertFalse($l->hasSubLocation());

        /*Without Zero, just 4 didits*/
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('8200');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Champagne-Ardenne', $l->getName());
        $this->assertEquals(8, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Ardennes', $l->getName());
        $this->assertEquals(29, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        /*With Zero, 5 digits*/
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('08200');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Champagne-Ardenne', $l->getName());
        $this->assertEquals(8, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Ardennes', $l->getName());
        $this->assertEquals(29, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        /*Without Zero, 4 digits and letters*/
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('8200AAA');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Champagne-Ardenne', $l->getName());
        $this->assertEquals(8, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Ardennes', $l->getName());
        $this->assertEquals(29, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        /*Test 'Corse' and zones with three digits*/
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('20240');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Corse', $l->getName());
        $this->assertEquals(9, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Haute-Corse', $l->getName());
        $this->assertEquals(34, $l->getId());

        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('20145');
        $this->assertEquals('region', $l->getType());
        $this->assertEquals('Corse', $l->getName());
        $this->assertEquals(9, $l->getId());

        $this->assertTrue($l->hasSubLocation());

        $l = $l->getSubLocation();
        $this->assertInstanceOf('EBT\GeoZipLocation\Core\Location\LocationInterface', $l);
        $this->assertEquals('zone', $l->getType());
        $this->assertEquals('Corse-du-Sud', $l->getName());
        $this->assertEquals(33, $l->getId());

        $zip = array("14350", "84150", "24660", "29870", "34920", "56610", "45420", "22350", "11110", "52100",
            "88290", "13400", "36000", "88330", "60740", "76510", "86540", "27932", "45650", "45130", "2420",
            "31180", "21130", "13860", "76116", "78400", "38120", "47290", "17240", "25320", "65800", "77157",
            "84250", "87210", "86110", "47600", "89290", "73730", "20160", "60126", "21800", "33690", "55320",
            "77460", "42650", "87140", "78114", "24400", "24430", "35690", "49150", "54130", "94240", "54111",
            "28250", "8500", "38500", "66140", "2120", "39230", "38850", "59149", "51450", "30220", "72370", "13450",
            "31860", "68920", "27110", "19330", "38780", "59480", "6110", "33120", "38121", "62620", "79110", "6370",
            "53000", "54310", "71510", "86130", "73130", "78230", "40120", "85670", "22950", "85480", "35870", "64270",
            "11610", "6000", "22230", "35800", "72230", "22530", "59610", "77330", "18340", "22343", "1100", "60530",
            "28300", "11120", "8300", "84170", "63800", "3600", "77164", "95300", "27430", "77163", "11140", "93160",
            "25530", "51530", "56660", "59232", "92150", "31670", "74540", "62480", "62126", "28310", "60130", "33130",
            "46100", "8150", "7790", "62145", "38290", "29280", "60210", "62110", "91410", "93410", "59730", "81120",
            "34830", "13500", "75014", "60500", "59258", "40420", "4410", "49690", "95820", "17290", "76390", "44100",
            "68200", "44520", "11200", "81580", "51000", "14330", "72270", "6200", "56190", "33360", "28630", "93390",
            "59186", "82350", "35540", "13880", "73210", "68720", "67700", "78520", "47180", "78790", "7580", "78670",
            "6260", "46400", "91310", "87170", "38470", "17390", "50110", "59163", "69510", "34200", "80131", "79230",
            "47000", "59162", "29740", "53390", "71290", "57360", "32000", "26210", "63350", "53940", "82500", "80420",
            "7340", "3410", "36140", "71210", "91420", "16270", "54390", "89340", "60110", "82710", "54120", "31530",
            "43440", "27240", "68390", "40100", "77200", "45260", "38540", "27170", "50180", "56530", "78510", "71130",
            "57175", "59185", "14130", "68600", "24540", "95320", "54550", "17800", "13790", "54430", "95740", "54510",
            "83690", "78390", "60860", "79270", "14490", "88560", "34410", "44240", "86470", "60400", "32200", "49160",
            "40500", "44140", "77300", "60138", "81990", "83570", "7290", "21200", "10350", "62155", "84100", "78250",
            "77370", "28800", "63500", "67330", "65140", "36130", "59264", "60360", "97170", "27530", "71580", "72330",
            "62450", "17310", "44800", "17880", "24700", "14230", "6510", "67400", "28100", "42390", "59630", "80480",
            "47160", "31390", "61570", "8100", "56550", "60390", "73220", "44310", "49400", "47510", "2540", "29830",
            "84460", "94160", "79160", "94350", "45310", "62510", "91510", "59450", "35480", "83120", "45520", "35135",
            "24500", "80190", "24300", "34420", "88200", "62141", "47480", "8170", "13119", "41320", "13103", "45200",
            "62670", "45680", "62120", "78190", "38118", "7170", "49240", "31130", "57515", "83480", "26160", "79410",
            "92250", "17600", "77130", "45290", "84360", "57185", "27250", "76280", "9210", "8210", "80510", "11220",
            "76680", "86500", "34000", "44522", "80200", "29260", "39130", "7120", "76200", "61150", "13680", "36170",
            "30126", "3380", "68360", "59147", "42510", "12700", "62000", "30110", "29670", "56860", "68740", "41290",
            "93800", "1210", "57400", "29430", "9300", "30500", "57740", "74350", "69290", "85310", "94510", "37350",
            "63270", "1580", "54250", "59590", "78240", "44390", "78860", "19460", "80440", "29590", "59115", "2820",
            "44470", "74310", "45190", "44118", "48200", "8460", "56260", "82130", "62152", "92130", "83630", "14790",
            "54560", "63970", "24650", "3210", "62760", "92260", "32330", "44640", "39260", "72540", "44220", "56220",
            "74300", "69390", "76850", "59000", "2700", "11170", "82000", "69450", "49300", "63300", "17120", "38570",
            "35120", "68570", "8350", "63830", "3200", "54820", "62680", "62530", "74420", "65710", "2340", "20109",
            "8090", "54700", "17380", "58120", "58390", "74740", "72650", "93310", "21450", "77173", "35320", "54400",
            "95250", "27800", "85200", "63310", "85500", "78113", "72200", "24755", "34570", "39270", "2590", "13440",
            "38170", "63910", "26700", "79240", "79700", "64510", "22700", "17160", "1440", "91550", "63700", "31470",
            "74950", "62730", "75019", "57800", "2500", "53500", "33570", "88340", "49140", "91390", "58600", "80090",
            "50150", "83430", "80350", "2680", "22000", "35235", "8000", "31620", "34240", "44670", "76500", "97412",
            "63460", "57390", "51430", "38630", "46160", "54720", "59110", "39380", "22600", "7610", "34190", "18400",
            "71460", "59129", "18410", "13190", "77114", "13009", "82136", "66450", "35410", "60370", "58660", "16480",
            "4730", "18600", "28350", "57255", "78420", "42155", "74110", "91150", "93460", "27660", "63450", "25800",
            "35130", "3340", "54500", "88600", "57660", "33113", "41700", "24550", "67750", "11330", "35111", "88550");
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        foreach ($zip as $z) {
            $l = $frTranslator->getLocationForZip($z);
            $this->assertEquals(true, isset($l));
        }

    }

    /**
     * testGetLocationForZipNotFound
     *
     * @expectedException \EBT\GeoZipLocation\Exception\ResourceNotFoundException
     */
    public function testGetLocationForZipNotFound()
    {
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $l = $frTranslator->getLocationForZip('0000');
    }

    /**
     * testGetSanitizeZipCode
     */
    public function testGetSanitizeZipCode()
    {
        $f = new TranslatorFactory();
        $frTranslator = $f->create('FR');
        $this->assertEquals('28008', $frTranslator->getSanitizeZipCode('28008aaa'));
        $this->assertEquals(false, $frTranslator->getSanitizeZipCode('420'));
    }
}
