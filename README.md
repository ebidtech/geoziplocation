geoziplocation
==========

[![Build Status](https://travis-ci.org/ebidtech/geoziplocation.png?branch=master)](https://travis-ci.org/ebidtech/geoziplocation)

Given zipcode returns location


SAMPLE USAGE:

```
  $myFactory = new TranslatorFactory();
  $ptTranslator = $myFactory->create('PT');
        
  $region = $ptTranslator->getLocationForZip('4730');
  $region->getType();
  $region->getName();
  $region->getId();
        
  if($region->hasSubLocation())
  {
    $zone->getSubLocation();
    $zone->getType();
    $zone->getName();
    $zone->getId(); 
    
    if($zone->hasSubLocation())
    {
      $area->getSubLocation();
      $area->getType();
      $area->getName();
      $area->getId();    
    }    
  }
{code}        
 ```
