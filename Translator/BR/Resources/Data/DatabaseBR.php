<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Translator\BR\Resources\Data;

/**
 * Class DatabaseBR
 */
abstract class DatabaseBR
{
    public static $map = array(
        1000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 1),
        11000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 2),
        20000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 3),
        29000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 4),
        30000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 5),
        40000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 6),
        49000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 7),
        50000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 8),
        57000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 9),
        58000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 10),
        59000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 11),
        60000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 12),
        64000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 13),
        65000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 14),
        66000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 15),
        68900 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 16),
        69000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 17),
        69300 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 18),
        69400 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 19),
        69900 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 20),
        70000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 21),
        72800 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 22),
        73000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 23),
        73700 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 24),
        76800 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 25),
        77000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 26),
        78000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 27),
        79000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 28),
        80000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 29),
        88000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 30),
        90000 => array('area_id' => 0,'zone_id' => 0, 'region_id' => 31),
    );

    public static $areas = array(
        0 => 'NA',
    );

    public static $zones = array(
        0 => 'NA',
    );

    public static $regions = array(
        1 => 'São Paulo Metropolitan Region',
        2 => 'Estado de São Paulo',
        3 => 'Estado de Rio de Janeiro',
        4 => 'Estado de Espírito Santo',
        5 => 'Estado de Minas Gerais',
        6 => 'Estado de Bahia',
        7 => 'Estado de Sergipe',
        8 => 'Estado de Pernambuco',
        9 => 'Estado de Alagoas',
        10 => 'Estado de Paraíba',
        11 => 'Estado de Rio Grande do Norte',
        12 => 'Estado de Ceará',
        13 => 'Estado de Piauí',
        14 => 'Estado de Maranhão',
        15 => 'Estado de Pará',
        16 => 'Estado de Amapá',
        17 => 'Estado de Amazonas (parte 1)',
        18 => 'Estado de Roraima',
        19 => 'Estado de Amazonas (parte 2)',
        20 => 'Estado de Acre',
        21 => 'Distrito Federal (parte 1)',
        22 => 'Estado de Goiás (parte 1)',
        23 => 'Distrito Federal (parte 2)',
        24 => 'Estado de Goiás (parte 2)',
        25 => 'Estado de Rondônia',
        26 => 'Estado de Tocantins',
        27 => 'Estado de Mato Grosso',
        28 => 'Estado de Mato Grosso do Sul',
        29 => 'Estado de Paraná',
        30 => 'Estado de Santa Catarina',
        31 => 'Estado de Rio Grande do Sul',
    );
}
