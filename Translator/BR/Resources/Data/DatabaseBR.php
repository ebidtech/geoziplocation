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
        '1111' => array('area_id' => 1111,'zone_id' => 1, 'region_id' => 4),
    );

    public static $areas = array(
        1 => 'xxx',

    );

    public static $zones = array(
        1 => 'xxx',

    );

    public static $regions = array(
        1 => 'São Paulo (SP)',
        2 => 'Rio de Janeiro (RJ)',
        3 => 'Espirito Santo (ES)',
        4 => 'Minas Gerais (MG)',
        5 => 'Bahia (BA)',
        6 => 'Sergipe (SE)',
        7 => 'Pernambuco (PE)',
        8 => 'Alagoas (AL)',
        9 => 'Paraiba (PB)',
        10 => 'Rio Grande do Norte (RN)',
        11 => 'Ceará',
        12 => 'Piauí (PI)',
        13 => 'Maranhão (MA)',
        14 => 'Pará (PA)',
        15 => 'Amapá (AP)',
        16 => 'Amazonas (AM)',
        17 => 'Roraima (RO)',
        18 => 'Acre (AC)',
        19 => 'Distrito Federal (DF)',
        20 => 'Goiás (GO)',
        21 => 'Tocantins',
        22 => 'Mato Grosso (MT)',
        23 => 'Rondônia (RO)',
        24 => 'Mato Grosso do Sul (MS)',
        25 => 'Paraná (PR)',
        26 => 'Santa Catarina (SC)',
        27 => 'Rio Grande do Sul (RS)'
    );
}
