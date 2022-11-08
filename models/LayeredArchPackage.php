<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class LayeredArchPackage implements Package{
    private int $packageCode;
    private int $subsetType;

    private String $setName;
    private String $setNameLang;

    private $packageOptionsArray;
    private $subsetTypeArray;
    private $optionStatusArray;

    public function __construct(){
        $this->packageCode = 1;
        $this->subsetType = 0;
        $this->setName = "layeredarch";
        $this->setNameLang = "Layered Arch";

        $this->packageOptionsArray = array("Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)",
                                            "3 piece seating chart half arch set (print service for cards is available for a small additional fee)",
                                            "Table numbers 1-30",
                                            "Gold Card option04 with choice of Gifts & Cards sign",
                                            "5 Reserved signs",
                                            "Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)",
                                            "Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)",
                                            "1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)",
                                            "1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)",
                                            "Unplugged Ceremony sign",
                                            "Hairpin Record Player Prop",
                                            "%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above"
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