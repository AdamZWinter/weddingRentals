<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class ParentPackage implements Package{
    protected int $packageCode;
    protected int $subsetType;

    protected String $setName;
    protected String $setNameLang;

    protected $packageOptionsArray;
    protected $subsetTypeArray;
    protected $optionStatusArray;
    protected $subsetPricesArray;

    // public function __construct(){
    //     $this->packageCode = 0;
    //     $this->subsetType = 0;
    //     $this->setName = "parentClass";
    //     $this->setNameLang = "Parent Class";

    //     $this->packageOptionsArray = array("Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         "Error",
    //                                         );
        
    //     $this->subsetTypeArray = array("Error: Initializer",   //16
    //                                     "Error: Initializer",  //32
    //                                     "Error: Initializer",  //48
    //                                     );

            // $this->subsetPricesArray = array(849.00,
            // 749.00,
            // 649.00
            // );


    //     $this->optionStatusArray = [];
    //     for($i=0; $i<count($this->packageOptionsArray); $i++){
    //         array_push($this->optionStatusArray, FALSE);
    //     }
    // }

    public function getSetName(){return $this->setName;}
    public function getSetNameLang(){return $this->setNameLang;}

    public function getPackagePrice(){
        return $this->subsetPricesArray[($this->subsetType >> 4) - 1];
    }

    public function getSubsetTypeLang(){
        return $this->subsetTypeArray[($this->subsetType >> 4) - 1];
    }

    public function getSubsetType(){return $this->subsetType;}

    public function setSubsetType($typeCode){
        $this->subsetType = $typeCode;
        $this->packageCode = $this->packageCode & 0b11111111111111111111111100001111;
        $this->packageCode = $this->packageCode | $typeCode;
    }

    public function getCode(){
        $this->packageCode = $this->packageCode & 0b00000000000000000000000011111111;
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            if($this->optionStatusArray[$i]){
                $this->packageCode = $this->packageCode ^ (1 << (8 + $i));
            }
        }
        return $this->packageCode;
    }

    public function decode($packageCode){
        $this->packageCode = $packageCode;
        $this->subsetType = $packageCode & 0b00000000000000000000000011110000;
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            if( ((1 << ($i + 8)) & $packageCode) != 0 ){$this->optionStatusArray[$i] = TRUE;}
        }
    }

    public function getPackageOptionsArray(){return $this->packageOptionsArray;}
    public function getSubsetTypeArray(){return $this->subsetTypeArray;}
    public function getSubsetPricesArray(){return $this->subsetPricesArray;}

    public function getChoicesArray(){
        $choicesArray = [];
        for($i = 0; $i < count($this->packageOptionsArray); $i++){
            if( $this->optionStatusArray[$i] == TRUE ){
                array_push($choicesArray, $this->packageOptionsArray[$i]);
            }
        }
        return $choicesArray;
    }


    /**
     * Get the value of option
     */ 
    public function getOptionStatus($index)
    {
        return $this->optionStatusArray[$index];
    }

    /**
     * Set the value of option
     *
     */ 
    public function setOptionStatus($index, $booleanStatus)
    {
        $this->optionStatusArray[$index] = $booleanStatus;
        $updateCodeAndDisregard = $this->getCode();
    }


}//end class




?>