<?php

require('../models/Package.php');
require('../models/ParentPackage.php');
require('../models/TestPackage.php');


$laPackage = new TestPackage();
//$laPackage->overwriteConstruct();

//$laPackage = new LayeredArchPackage();

$laPackage->setSubsetType(16);


echo $laPackage->getSetName();
echo '<br>';
echo $laPackage->getSetNameLang();
echo '<br>';
echo $laPackage->getSubsetType();
echo '<br>';

$laPackage->setOptionStatus(0, TRUE);
$laPackage->setOptionStatus(5, TRUE);
//$laPackage->setOptionStatus(8, TRUE);
//$laPackage->setOptionStatus(10, TRUE);

echo $laPackage->getCode();
echo '<br>';
echo decbin($laPackage->getCode());

echo '<br>';
echo '<br>';
echo $laPackage->getSubsetTypeLang();
echo '<br>';
var_dump($laPackage->getChoicesArray());
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

$laPackage = new TestPackage();
$laPackage->decode(656689);

//$laPackage->setSubsetType(48);

echo $laPackage->getSetName();
echo '<br>';
echo $laPackage->getSetNameLang();
echo '<br>';
echo $laPackage->getSubsetType();
echo '<br>';


$laPackage->setOptionStatus(8, TRUE);
$laPackage->setOptionStatus(10, TRUE);

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