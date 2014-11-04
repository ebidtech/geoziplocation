<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BE\Resources\Data;

/**
 * Class DatabaseBE
 */
abstract class DatabaseBE
{

    /**
     * @var array
     */
    public static $map = array(
        '10' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 1), //1000-1299
        '11' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 1), //1000-1299
        '12' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 1), //1000-1299

        '20' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '21' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '22' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '23' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '24' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '25' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '26' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '27' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '28' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999
        '29' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 2), //2000-2999

        '15' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '16' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '17' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '18' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '19' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '30' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '31' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '32' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '33' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499
        '34' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 2), //1500-1999 and 3000-3499

        '80' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '81' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '82' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '83' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '84' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '85' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '86' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '87' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '88' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999
        '89' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 2), //8000-8999

        '90' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '91' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '92' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '93' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '94' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '95' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '96' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '97' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '98' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999
        '99' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 2), //9000-9999

        '35' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 2), //3500-3999
        '36' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 2), //3500-3999
        '37' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 2), //3500-3999
        '38' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 2), //3500-3999
        '39' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 2), //3500-3999

        '13' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 3), //1300-1499
        '14' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 3), //1300-1499

        '60' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '61' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '62' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '63' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '64' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '65' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '70' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '71' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '72' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '73' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '74' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '75' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '76' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '77' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '78' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999
        '79' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 3), //6000-6599 and 7000-7999

        '40' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '41' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '42' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '43' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '44' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '45' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '46' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '47' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '48' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999
        '49' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 3), //4000-4999

        '66' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3), //6600-6999
        '67' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3), //6600-6999
        '68' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3), //6600-6999
        '69' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3), //6600-6999

        '50' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '51' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '52' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '53' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '54' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '55' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '56' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '57' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '58' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
        '59' => array('area_id' => 0, 'zone_id' => 11, 'region_id' => 3), //5000-5999
    );

    public static $areas = array(
        0 => 'NA',
    );

    public static $zones = array(
        1 => 'Brussels',
        2 => 'Antwerpen',
        3 => 'Vlaams-Brabant',
        4 => 'West-Vlaanderen',
        5 => 'Oost-Vlaanderen ',
        6 => 'Limburg',
        7 => 'Brabant wallon',
        8 => 'Hainaut',
        9 => 'Liège',
        10 => 'Luxembourg',
        11 => 'Namur',
    );

    public static $regions = array(
        1 => 'Brussels',
        2 => 'Flandres',
        3 => 'Wallonie',
    );
}
