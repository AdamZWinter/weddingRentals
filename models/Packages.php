<?php

require('Package.php');
require('ParentPackage.php');
require('LayeredArchPackage.php');
require('ModernRoundPackage.php');
require('VintageMirrorPackage.php');
require('DarkWalnutPackage.php');
require('RusticWoodPackage.php');

class Packages{

    public static function getPackageByCode($packageCode){
        $setCode = $packageCode & 0b1111;
        switch($setCode){
            case 1:
                $package = new LayeredArchPackage();
                $package->decode($packageCode);
                return $package;
            case 2:
                $package = new  ModernRoundPackage();
                $package->decode($packageCode);
                return $package;
            case 3:
                $package = new VintageMirrorPackage();
                $package->decode($packageCode);
                return $package;
            case 4:
                $package = new DarkWalnutPackage();
                $package->decode($packageCode);
                return $package;
            case 5:
                $package = new RusticWoodPackage();
                $package->decode($packageCode);
                return $package;
        }
    }
}//end class



?>