<?php

require('../models/Extras.php');

$extrasObj = new Extras();
$extrasObj->setOptionStatus(0, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(1, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(2, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(3, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(4, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(5, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
//$extrasObj = new Extras();
$extrasObj->setOptionStatus(6, TRUE);
echo $extrasObj->getCode();
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
$extrasObj->setOptionStatus(2, FALSE);
$extrasObj->setOptionStatus(4, FALSE);
$extrasObj->setOptionStatus(5, FALSE);
$extrasCode = $extrasObj->getCode();
echo $extrasCode;
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());
echo '<br>';
echo '<br>';
echo '<br>';

$extrasObj = new Extras();
$extrasObj->decode($extrasCode);
$extrasCode2 = $extrasObj->getCode();
echo $extrasCode2;
echo '<br>';
var_dump($extrasObj->getSelectedExtrasArrayLang());


echo '<br>';
echo '<br>';



?>