<?php

require('../models/Package.php');
require('../models/layeredArchPackage.php');

$laPackage = new LayeredArchPackage();

$laPackage->setSubsetType(16);

echo $laPackage->getSetName();
echo '<br>';
echo $laPackage->getSetNameLang();
echo '<br>';
echo $laPackage->getSubsetType();
echo '<br>';

$laPackage->setWelcomeSign(TRUE);
$laPackage->setTableNumbers(TRUE);
$laPackage->setSunsetSmall2(TRUE);

echo $laPackage->getCode();
echo '<br>';
echo decbin($laPackage->getCode());





?>