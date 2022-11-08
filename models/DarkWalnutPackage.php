<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// exmaple:  Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class DarkWalnutPackage implements Package{
    private int $packageCode;
    private int $subsetType;

    private String $setName;
    private String $setNameLang;

    private $packageOptionsArray;
    private $subsetTypeArray;
    private $optionStatusArray;

    public function __construct(){
        $this->packageCode = 4;
        $this->subsetType = 0;  //a la cart
        $this->setName = "darkwalnut";
        $this->setNameLang = "Dark Walnut";

        $this->packageOptionsArray = array("Welcome to Our Beginning Round (24 in. diameter, with easel) or Rectangular (35.5 x 21 with easel)",
                                            "Find your Seat  (35.5 x 21 organizer with 30 clips & easel)",
                                            "Table Numbers, double-sided (Numbers 1-30, 3.5 x 9)",
                                            "Antique Jug with Honeymoon Fund (jug & mini-hanger, 4.75 x 10) (2pc)",
                                            "Mr. & Mrs. Head Table Sign with small easel 7.25 x 22.5",
                                            "We know that you would be here today if Heaven weren%27t so far away  (10 x 10.5 memorial sign or seat saver with small easel)",
                                            "Here comes the Bride ring bearer carrier  (10.25 x 17.25 with cord)",
                                            "Better & Together Chair Hangers (with cord 10.25 x 17.25) (2pc)",
                                            "Please Sign our Guestbook (self standing 7.25 x 16)",
                                            "Just Married & Thank You (reversible photo-shoot prop 7.25 x 31)",
                                            "Take One (7.25 x 7.25)",
                                            "Programs (7.25 x 16)",
                                            "Enjoy the Moment, no photography please 10.5 in. x 17 in. with small easel",
                                            "8 Reserved signs (3.5 in. x 12 in.  4 with cord hanger option) (8pc)",
                                            "Antique Leather and Wooden Trunk with Cards Banner",
                                            "1 Corinthians 13 signs ($99 additional)",
                                            "Vintage Typewriter with Message to Guests ($99 additional)"
                                            );
        
        $this->subsetTypeArray = array("Full Package",   //16
                                        "Without Seating",      //32
                                        "Pick Four"  //48
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