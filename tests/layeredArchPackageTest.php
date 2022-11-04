<?php

require('../models/Package.php');
require('../models/LayeredArchPackage.php');

$laPackage = new LayeredArchPackage();

$laPackage->setSubsetType(16);


echo $laPackage->getSetName();
echo '<br>';
echo $laPackage->getSetNameLang();
echo '<br>';
echo $laPackage->getSubsetType();
echo '<br>';

$laPackage->setOption01(TRUE);
$laPackage->setOption03(TRUE);
//$laPackage->setOption10(TRUE);
//$laPackage->setOption12(TRUE);

echo $laPackage->getCode();
echo '<br>';
echo decbin($laPackage->getCode());

echo '<br>';
echo '<br>';
echo $laPackage->getSubsetTypeLang();
echo '<br>';
//var_dump($laPackage->getChoicesArray());
foreach($laPackage->getChoicesArray() as $option){
    echo $option;
    echo '<br>';
}
echo '<br>';
echo '<br>';
var_dump($laPackage->getPackageOptionsArray());
echo '<br>';
echo '<br>';

//**************reset by code */

$laPackage = new LayeredArchPackage();
$laPackage->decode(656689);

//$laPackage->setSubsetType(48);

echo $laPackage->getSetName();
echo '<br>';
echo $laPackage->getSetNameLang();
echo '<br>';
echo $laPackage->getSubsetType();
echo '<br>';

//$laPackage->setOption01(TRUE);
//$laPackage->setOption03(TRUE);
$laPackage->setOption08(TRUE);
$laPackage->setOption10(TRUE);

echo $laPackage->getCode();
echo '<br>';
echo decbin($laPackage->getCode());

echo '<br>';
echo '<br>';
echo $laPackage->getSubsetTypeLang();
echo '<br>';
//var_dump($laPackage->getChoicesArray());
foreach($laPackage->getChoicesArray() as $option){
    echo $option;
    echo '<br>';
}
echo '<br>';
echo '<br>';
var_dump($laPackage->getPackageOptionsArray());
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



?>