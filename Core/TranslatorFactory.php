<?php
/*
 * This file is a part of the user agent parser.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EBT\GeoZipLocation\Core;

use EBT\GeoZipLocation\Core\TranslatorInterface;

/**
 * Class TranslatorFactory
 */
class TranslatorFactory
{
    const TRANSLATORS_NAMESPACE = 'EBT\GeoZipLocation\Translators';

    /**
     * Creates a new translator
     *
     * @param string $countryCode Two character ISO 3166-1 compliant
     *
     * @return TranslatorInterface a new translator
     *
     * @throws \RuntimeException
     */
    public function create($countryCode)
    {
        $className = sprintf('%s\%s\Translator', self::TRANSLATORS_NAMESPACE, $countryCode);
        if (!class_exists($className)) {
            throw new \RuntimeException(
                sprintf(
                    'Invalid translator class /%s',
                    $className
                )
            );
        }
        $translator = new $className();

        if ($countryCode != $translator->getCountryCode()) {
            throw new \RuntimeException(
                sprintf(
                    'Invalid country code when creating new translator %s/%s',
                    $countryCode,
                    $translator->getCountryCode()
                )
            );
        }

        return $translator;
    }
}
