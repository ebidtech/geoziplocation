<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\PL\Resources\Data;

/**
 * Class DatabasePL
 */
abstract class DatabasePL
{

    /**
     * @var array
     */
    public static $map = array(
        /* zone #1 okręg warszawski */
        /* region #4 lubelskie */
        '085' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 4),

        /* region #7 mazowieckie */
        '01' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '02' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '03' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '04' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '05' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '06' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '07' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '08' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),

        '081' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '082' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '083' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '084' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),
        '09' => array('area_id' => 0, 'zone_id' => 1, 'region_id' => 7),

        /* zone #2 okręg olsztyński */
        /* region #14 warmińsko­mazurskie */
        '10' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '11' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '12' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '13' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '14' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '193' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '194' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),
        '195' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 14),

        /* region #10 podlaskie */
        '15' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),
        '16' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),
        '17' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),
        '18' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),
        '191' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),
        '192' => array('area_id' => 0, 'zone_id' => 2, 'region_id' => 10),

        /* zone #3 okręg lubelski */
        /* region #4 lubelskie */
        '20' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 4),
        '21' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 4),
        '22' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 4),
        '23' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 4),
        '24' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 4),

        /* region #3 łódzkie */
        '263' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 3),

        /* region #7 mazowieckie */
        '264' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 7),
        '265' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 7),
        '266' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 7),
        '267' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 7),
        '268' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 7),

        /* region #13 świętokrzyskie */
        '25' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '260' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '261' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '262' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '272' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '274' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '275' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '276' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '28' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),
        '29' => array('area_id' => 0, 'zone_id' => 3, 'region_id' => 13),

        /* zone #4 okręg krakowski */
        /* region #6 małopolskie */
        '30' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '31' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '32' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '33' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '341' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '342' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '344' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '345' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '346' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '347' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '38245' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '38246' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '38247' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),
        '383' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 6),

        /* region #12 śląskie */
        '343' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 12),

        /* region #9 podkarpackie */
        '35' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '36' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '37' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '381' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '3820' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '3821' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '3822' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '3823' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '38241' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '38242' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '38243' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '38244' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '384' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '385' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '386' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '387' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),
        '39' => array('area_id' => 0, 'zone_id' => 4, 'region_id' => 9),

        /* zone #5 okręg katowicki */
        /* region #12 śląskie */
        '40' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),
        '41' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),
        '42' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),
        '43' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),
        '44' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),
        '474' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 12),

        /* region #8 opolskie */
        '45' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '46' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '471' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '472' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '473' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '48' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),
        '49' => array('area_id' => 0, 'zone_id' => 5, 'region_id' => 8),

        /* zone #6 okręg wrocławskii */
        /* region #1 dolnośląskie */
        '5' => array('area_id' => 0, 'zone_id' => 6, 'region_id' => 1),

        /* zone #7 okręg poznański */
        /* region #15 wielkopolskie */
        '60' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 15),
        '61' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 15),
        '62' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 15),
        '63' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 15),
        '64' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 15),

        /* region #5 lubuskie */
        '65' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '66' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '671' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '673' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '674' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '68' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),
        '69' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 5),

        /* region #1 dolnośląskie */
        '672' => array('area_id' => 0, 'zone_id' => 7, 'region_id' => 1),

        /* zone #8 okręg szczeciński */
        /* region #16 zachodniopomorskie */
        '70' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '71' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '72' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '73' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '74' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '75' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '760' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '761' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),
        '78' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 16),

        /* region #11 pomorskie */
        '762' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 11),
        '771' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 11),
        '772' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 11),
        '773' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 11),

        /* region #15 wielkopolskie */
        '774' => array('area_id' => 0, 'zone_id' => 8, 'region_id' => 15),

        /* zone #9 okręg gdański */
        /* region #11 pomorskie */
        '80' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '81' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '821' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '822' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '824' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '825' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '83' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '84' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),
        '896' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 11),

        /* region #14 warmińsko­mazurskie */
        '823' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 14),

        /* region #2 kujawsko­pomorskie */
        '85' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '86' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '87' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '88' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '891' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '892' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '894' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),
        '895' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 2),

        /* region #15 wielkopolskie */
        '893' => array('area_id' => 0, 'zone_id' => 9, 'region_id' => 15),

        /* zone #10 okręg łódzki */
        /* region #3 łódzkie */
        '90' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '91' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '92' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '93' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '94' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '95' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '961' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '962' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '97' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '98' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
        '99' => array('area_id' => 0, 'zone_id' => 10, 'region_id' => 3),
    );

    public static $areas = array(
        0 => 'NA',
    );

    public static $zones = array(
        1 => 'okręg warszawski',
        2 => 'okręg olsztyński',
        3 => 'okręg lubelski',
        4 => 'okręg krakowski',
        5 => 'okręg katowicki',
        6 => 'okręg wrocławskii',
        7 => 'okręg poznański',
        8 => 'okręg szczeciński',
        9 => 'okręg gdański',
        10 => 'okręg łódzki',
    );

    public static $regions = array(
        1 => 'dolnośląskie',
        2 => 'kujawsko­pomorskie',
        3 => 'łódzkie',
        4 => 'lubelskie',
        5 => 'lubuskie',
        6 => 'małopolskie',
        7 => 'mazowieckie',
        8 => 'opolskie',
        9 => 'podkarpackie',
        10 => 'podlaskie',
        11 => 'pomorskie',
        12 => 'śląskie',
        13 => 'świętokrzyskie',
        14 => 'warmińsko­mazurskie',
        15 => 'wielkopolskie',
        16 => 'zachodniopomorskie',
    );
}
