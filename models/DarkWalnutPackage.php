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

    private bool $option01;
    private bool $option02;
    private bool $option03;
    private bool $option04;
    private bool $option05;
    private bool $option06;
    private bool $option07;
    private bool $option08;
    private bool $option09;
    private bool $option10;
    private bool $option11;
    private bool $option12; 
    private bool $option13;
    private bool $option14; 
    private bool $option15; 
    private bool $option16;
    private bool $option17; 

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

        $this->option01 = False;
        $this->option02 = False;
        $this->option03 = False;
        $this->option04 = False;
        $this->option05 = False;
        $this->option06 = False;
        $this->option07 = False;
        $this->option08 = False;
        $this->option09 = False;
        $this->option10 = False;
        $this->option11 = False;
        $this->option12 = False;
        $this->option13 = False;
        $this->option14 = False;
        $this->option15 = False;
        $this->option16 = False;
        $this->option17 = False;
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

    public function getCode(){
        $this->packageCode = $this->packageCode & 0b00000000000000000000000011111111;
        if($this->option01){$this->packageCode = $this->packageCode ^ (1 << 8);}
        if($this->option02){$this->packageCode = $this->packageCode ^ (1 << 9);}
        if($this->option03){$this->packageCode = $this->packageCode ^ (1 << 10);}
        if($this->option04){$this->packageCode = $this->packageCode ^ (1 << 11);}
        if($this->option05){$this->packageCode = $this->packageCode ^ (1 << 12);}
        if($this->option06){$this->packageCode = $this->packageCode ^ (1 << 13);}
        if($this->option07){$this->packageCode = $this->packageCode ^ (1 << 14);}
        if($this->option08){$this->packageCode = $this->packageCode ^ (1 << 15);}
        if($this->option09){$this->packageCode = $this->packageCode ^ (1 << 16);}
        if($this->option10){$this->packageCode = $this->packageCode ^ (1 << 17);}
        if($this->option11){$this->packageCode = $this->packageCode ^ (1 << 18);}
        if($this->option12){$this->packageCode = $this->packageCode ^ (1 << 19);}
        if($this->option13){$this->packageCode = $this->packageCode ^ (1 << 20);}
        if($this->option14){$this->packageCode = $this->packageCode ^ (1 << 21);}
        if($this->option15){$this->packageCode = $this->packageCode ^ (1 << 22);}
        if($this->option16){$this->packageCode = $this->packageCode ^ (1 << 23);}
        if($this->option17){$this->packageCode = $this->packageCode ^ (1 << 24);}
        return $this->packageCode;
    }

    public function decode($packageCode){
        $this->packageCode = $packageCode;
        $this->subsetType = $packageCode & 0b00000000000000000000000011110000;
        if( ((1 << 8) & $packageCode) != 0 ){$this->setOption01(TRUE);}
        if( ((1 << 9) & $packageCode) != 0 ){$this->setOption02(TRUE);}
        if( ((1 << 10) & $packageCode) != 0 ){$this->setOption03(TRUE);}
        if( ((1 << 11) & $packageCode) != 0 ){$this->setOption04(TRUE);}
        if( ((1 << 12) & $packageCode) != 0 ){$this->setOption05(TRUE);}
        if( ((1 << 13) & $packageCode) != 0 ){$this->setOption06(TRUE);}
        if( ((1 << 14) & $packageCode) != 0 ){$this->setOption07(TRUE);}
        if( ((1 << 15) & $packageCode) != 0 ){$this->setOption08(TRUE);}
        if( ((1 << 16) & $packageCode) != 0 ){$this->setOption09(TRUE);}
        if( ((1 << 17) & $packageCode) != 0 ){$this->setOption10(TRUE);}
        if( ((1 << 18) & $packageCode) != 0 ){$this->setOption11(TRUE);}
        if( ((1 << 19) & $packageCode) != 0 ){$this->setOption12(TRUE);}
        if( ((1 << 20) & $packageCode) != 0 ){$this->setOption13(TRUE);}
        if( ((1 << 21) & $packageCode) != 0 ){$this->setOption14(TRUE);}
        if( ((1 << 22) & $packageCode) != 0 ){$this->setOption15(TRUE);}
        if( ((1 << 23) & $packageCode) != 0 ){$this->setOption16(TRUE);}
        if( ((1 << 24) & $packageCode) != 0 ){$this->setOption17(TRUE);}
    }

    public function setSubsetType($typeCode){
        $this->subsetType = $typeCode;
        $this->packageCode = $this->packageCode & 0b11111111111111111111111100001111;
        $this->packageCode = $this->packageCode | $typeCode;
    }

    public function getPackageOptionsArray(){return $this->packageOptionsArray;}

    public function getChoicesArray(){
        $choicesArray = [];
        for($i = 0; $i < count($this->packageOptionsArray); $i++){
            if( ((1 << ($i + 8)) & $this->packageCode) != 0 ){
                array_push($choicesArray, $this->packageOptionsArray[$i]);
            }
        }
        //array_push($choicesArray, $this->packageOptionsArray[0]);
        return $choicesArray;
    }


    




    /**
     * Get the value of option01
     */ 
    public function getOption01()
    {
        return $this->option01;
    }

    /**
     * Set the value of option01
     *
     * @return  self
     */ 
    public function setOption01($option01)
    {
        $this->option01 = $option01;

        return $this;
    }

    /**
     * Get the value of option02
     */ 
    public function getOption02()
    {
        return $this->option02;
    }

    /**
     * Set the value of option02
     *
     * @return  self
     */ 
    public function setOption02($option02)
    {
        $this->option02 = $option02;

        return $this;
    }
    

    /**
     * Get the value of option03
     */ 
    public function getOption03()
    {
        return $this->option03;
    }

    /**
     * Set the value of option03
     *
     * @return  self
     */ 
    public function setOption03($option03)
    {
        $this->option03 = $option03;

        return $this;
    }

    /**
     * Get the value of option04
     */ 
    public function getOption04()
    {
        return $this->option04;
    }

    /**
     * Set the value of option04
     *
     * @return  self
     */ 
    public function setOption04($option04)
    {
        $this->option04 = $option04;

        return $this;
    }

    /**
     * Get the value of option05
     */ 
    public function getOption05()
    {
        return $this->option05;
    }

    /**
     * Set the value of option05
     *
     * @return  self
     */ 
    public function setOption05($option05)
    {
        $this->option05 = $option05;

        return $this;
    }

    /**
     * Get the value of option06
     */ 
    public function getOption06()
    {
        return $this->option06;
    }

    /**
     * Set the value of option06
     *
     * @return  self
     */ 
    public function setOption06($option06)
    {
        $this->option06 = $option06;

        return $this;
    }

    /**
     * Get the value of option07
     */ 
    public function getOption07()
    {
        return $this->option07;
    }

    /**
     * Set the value of option07
     *
     * @return  self
     */ 
    public function setOption07($option07)
    {
        $this->option07 = $option07;

        return $this;
    }

    /**
     * Get the value of option08
     */ 
    public function getOption08()
    {
        return $this->option08;
    }

    /**
     * Set the value of option08
     *
     * @return  self
     */ 
    public function setOption08($option08)
    {
        $this->option08 = $option08;

        return $this;
    }

    /**
     * Get the value of option09
     */ 
    public function getOption09()
    {
        return $this->option09;
    }

    /**
     * Set the value of option09
     *
     * @return  self
     */ 
    public function setOption09($option09)
    {
        $this->option09 = $option09;

        return $this;
    }

    /**
     * Get the value of option10
     */ 
    public function getOption10()
    {
        return $this->option10;
    }

    /**
     * Set the value of option10
     *
     * @return  self
     */ 
    public function setOption10($option10)
    {
        $this->option10 = $option10;

        return $this;
    }

    /**
     * Get the value of option11
     */ 
    public function getOption11()
    {
        return $this->option11;
    }

    /**
     * Set the value of option11
     *
     * @return  self
     */ 
    public function setOption11($option11)
    {
        $this->option11 = $option11;

        return $this;
    }

    /**
     * Get the value of option12
     */ 
    public function getOption12()
    {
        return $this->option12;
    }

    /**
     * Set the value of option12
     *
     * @return  self
     */ 
    public function setOption12($option12)
    {
        $this->option12 = $option12;

        return $this;
    }
}//end class




?>