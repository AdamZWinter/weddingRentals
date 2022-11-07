<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining bits]                 [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

interface Package{
    public function getCode();
    public function decode($packageCode);
    public function getSetName();
    public function getSetNameLang();
    public function getSubsetType();
    public function getSubsetTypeLang();
    public function setSubsetType($typeCode);
    public function getPackageOptionsArray();
    public function getChoicesArray();
    public function getOptionStatus($index);
    public function setOptionStatus($index, $booleanStatus);
}

?>