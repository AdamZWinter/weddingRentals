<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class ModernRoundPackage implements Package{
    private int $packageCode;
    private int $subsetType;

    private String $setName;
    private String $setNameLang;

    private $packageOptionsArray;
    private $subsetTypeArray;
    private $optionStatusArray;

    public function __construct(){
        $this->packageCode = 2;
        $this->subsetType = 0;  //a la cart
        $this->setName = "modernround";
        $this->setNameLang = "Modern Round";

        $this->packageOptionsArray = array("Large Custom Welcome (round center becomes a keepsake)",
                                            "Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)",
                                            "1-30 free standing table numbers",
                                            "Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)",
                                            "Set of Reserved signs (5)",
                                            "2 Selections of Small Square Bracket Signs (In Loving Memory, Gifts & Cards, Take One, and/or customize)",
                                            "2 Selections of Small Horizontal Bracket Signs (Guestbook, Programs, Mr. & Mrs. Take One, Gifts and Cards,  and/or customize)",
                                            "1 Medium Table Top  (Unplugged Ceremony, or Magnetic Sign with Cocktails heading,  In Loving Memory heading or customize",
                                            "All Full Set Rental Clients receive 1 SMALL COMPLIMENTARY 3-D CUSTOMIZATION on a small sign in addition to their Round Welcome Sign Keepsake"
                                            );
        
        $this->subsetTypeArray = array("Full Set",   //16
                                        "Pick Six",  //32
                                        "Pick Four" //48
                                        );

        $this->optionStatusArray = [];
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            array_push($this->optionStatusArray, FALSE);
        }
    }

    public function getSetName(){return $this->setName;}
    public function getSetNameLang(){return $this->setNameLang;}

    public function getSubsetType(){return $this->subsetType;}
    public function getSubsetTypeLang(){
        switch ($this->subsetType){
            case 16:
                return $this->subsetTypeArray[0];
            case 32:
                return $this->subsetTypeArray[1];
            case 48:
                return $this->subsetTypeArray[2];
            case 64:
                return $this->subsetTypeArray[3];
        }
    }

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

    public function getChoicesArray(){
        $choicesArray = [];
        for($i = 0; $i < count($this->packageOptionsArray); $i++){
            if( ((1 << ($i + 8)) & $this->packageCode) != 0 ){
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
    }


}//end class




?>