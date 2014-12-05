geoziplocation
==========

[![Build Status](https://travis-ci.org/ebidtech/geoziplocation.png?branch=master)](https://travis-ci.org/ebidtech/geoziplocation)

Given zipcode returns location

Sample USAGE:

```
        $myFactory = new TranslatorFactory();
        $deTranslator = $myFactory->create('PT');

        $region = $deTranslator->getLocationForZip('4730');
        $region->getType(); //returns "region"
        $region->getName(); //returns "Norte"
        $region->getId();

        if ($region->hasSubLocation()) {
            $zone = $region->getSubLocation();
            $zone->getType(); //returns "zone"
            $zone->getName(); //returns "Braga"
            $zone->getId();

            if ($zone->hasSubLocation()) {
                $area = $zone->getSubLocation();
                $area->getType(); //returns "area"
                $area->getName(); //returns "Vila Verde"
                $area->getId();
            }
        }
        
 ```
