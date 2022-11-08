<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class VintageMirrorPackage implements Package{
    private int $packageCode;
    private int $subsetType;

    private String $setName;
    private String $setNameLang;

    private $packageOptionsArray;
    private $subsetTypeArray;
    private $optionStatusArray;

    public function __construct(){
        $this->packageCode = 3;
        $this->subsetType = 0;  //a la cart
        $this->setName = "vintagemirror";
        $this->setNameLang = "Vintage Mirror";

        $this->packageOptionsArray = array("Welcome Sign with custom names & date & large wrought iron easel",
                                            "Antique Typewriter Rental with customized message (100 words or less)",
                                            "Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application",
                                            "Table Numbers 1-30",
                                            "Leather Domed Trunk with “cards” mirror with stand",
                                            "Enjoy the Moment- no photography please mirror with stand",
                                            "Guestbook mirror with stand",
                                            "Take One small vanity mirror",
                                            "1 Large Full Custom Mirror (50 words or less) with large wrought iron easel",
                                            "1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel",
                                            "1 Small Custom Mirror (10 words or less) with wrought iron easel",
                                            "Custom Mirror SMALL (up to 12 words) $40",
                                            "Custom Mirror MEDIUM (up to 24 words) $60",
                                            "Customer Mirror LARGE (up to 60 words) $80"
                                            );
        
        $this->subsetTypeArray = array("Platinum",   //16
                                        "Gold",      //32
                                        "Pick Six",  //48
                                        "Pick Four"  //64
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