<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining bits]                 [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class LayeredArchPackage implements Package{
    private int $packageCode;
    private int $subsetType;

    private $packageOptionsArray;

    private bool $welcomeSign;
    private bool $seatingChart;
    private bool $tableNumbers;
    private bool $terrarium;
    private bool $reservedSigns5;
    private bool $doubleHalfSmall2;
    private bool $sunsetSmall2;
    private bool $doubleHalfMedium;
    private bool $doubleFullMedium;
    private bool $unpluggedCeremony;
    private bool $hairpinRecordPlayer;
    private bool $headTableKeepsake; 

    public function __construct(){
        $this->packageCode = 1;
        $this->subsetType = 0;

        $this->packageOptionsArray = array("Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)",
                                            "3 piece seating chart half arch set (print service for cards is available for a small additional fee)",
                                            "Table numbers 1-30",
                                            "Gold Card Terrarium with choice of “Gifts & Cards” sign",
                                            "5 “Reserved” signs",
                                            "Up to 2 Double Half Arch Small signs (“Gifts & Cards,” “Take One,” “Dont Mind if I Do,” “In Loving Memory”)",
                                            "Up to 2 Sunset Small signs (“Please Sign Our Guestbook,” “Gifts & Cards,” “In Loving Memory”)",
                                            "1 Double Half Arch Medium sign (“Cheers,” “The Bar,” “Guestbook,” or Custom Acrylic Text)",
                                            "1 Double Full Arch Medium sign (“Signature Drinks,” or Custom Acrylic Text)",
                                            "Unplugged Ceremony sign",
                                            "Hairpin Record Player Prop",
                                            "%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above"
                                            );
        

        $this->welcomeSign = False;
        $this->seatingChart = False;
        $this->tableNumbers = False;
        $this->terrarium = False;
        $this->reservedSigns5 = False;
        $this->doubleHalfSmall2 = False;
        $this->sunsetSmall2 = False;
        $this->doubleHalfMedium = False;
        $this->doubleFullMedium = False;
        $this->unpluggedCeremony = False;
        $this->hairpinRecordPlayer = False;
        $this->headTableKeepsake = False;
    }

    public function getSetName(){return "layeredarch";}
    public function getSetNameLang(){return "Layered Arch";}

    public function getSubsetType(){return $this->subsetType;}
    public function getSubsetTypeLang(){
        switch ($this->subsetType){
            case 16:
                return "Full Set";
            case 32:
                return "Pick Six";
            case 48:
                return "Pick Four";
            case 64:
                return "Platinum";
        }
    }

    public function getCode(){
        $this->packageCode = $this->packageCode & 0b00000000000000000000000011111111;
        if($this->welcomeSign){$this->packageCode = $this->packageCode ^ (1 << 8);}
        if($this->seatingChart){$this->packageCode = $this->packageCode ^ (1 << 9);}
        if($this->tableNumbers){$this->packageCode = $this->packageCode ^ (1 << 10);}
        if($this->terrarium){$this->packageCode = $this->packageCode ^ (1 << 11);}
        if($this->reservedSigns5){$this->packageCode = $this->packageCode ^ (1 << 12);}
        if($this->doubleHalfSmall2){$this->packageCode = $this->packageCode ^ (1 << 13);}
        if($this->sunsetSmall2){$this->packageCode = $this->packageCode ^ (1 << 14);}
        if($this->doubleHalfMedium){$this->packageCode = $this->packageCode ^ (1 << 15);}
        if($this->doubleFullMedium){$this->packageCode = $this->packageCode ^ (1 << 16);}
        if($this->unpluggedCeremony){$this->packageCode = $this->packageCode ^ (1 << 17);}
        if($this->hairpinRecordPlayer){$this->packageCode = $this->packageCode ^ (1 << 18);}
        if($this->headTableKeepsake){$this->packageCode = $this->packageCode ^ (1 << 19);}
        return $this->packageCode;
    }

    public function decode($packageCode){
        $this->packageCode = $packageCode;
    }

    public function setSubsetType($typeCode){
        $this->subsetType = $typeCode;
        $this->packageCode = $this->packageCode & 0b11111111111111111111111100001111;
        $this->packageCode = $this->packageCode | $typeCode;
    }

    public function getPackageOptionsArray(){return $this->packageOptionsArray;}

    public function getChoicesArray(){
        $choicesArray = [];
        for($i = 0; $i<24; $i++){
            if( (1 << ($i + 8)) & $this->packageCode != 0 ){
                array_push($this->choicesArray, $this->PackageOptionsArray[$i]);
            }
        }
        return $choicesArray;
    }



    public function getWelcomeSign(){return $this->welcomeSign;}
    public function setWelcomeSign($included){$this->welcomeSign = $included;}

    public function getSeatingChart(){return $this->seatingChart;}
    public function setSeatingChart($included){$this->seatingChart = $included;}

    public function getTableNubmers(){return $this->tableNumbers;}
    public function setTableNumbers($included){$this->tableNumbers = $included;}


    /**
     * Get the value of terrarium
     */ 
    public function getTerrarium()
    {
        return $this->terrarium;
    }

    /**
     * Set the value of terrarium
     *
     * @return  self
     */ 
    public function setTerrarium($terrarium)
    {
        $this->terrarium = $terrarium;

        return $this;
    }

    /**
     * Get the value of reservedSigns5
     */ 
    public function getReservedSigns5()
    {
        return $this->reservedSigns5;
    }

    /**
     * Set the value of reservedSigns5
     *
     * @return  self
     */ 
    public function setReservedSigns5($reservedSigns5)
    {
        $this->reservedSigns5 = $reservedSigns5;

        return $this;
    }

    /**
     * Get the value of doubleHalfSmall2
     */ 
    public function getDoubleHalfSmall2()
    {
        return $this->doubleHalfSmall2;
    }

    /**
     * Set the value of doubleHalfSmall2
     *
     * @return  self
     */ 
    public function setDoubleHalfSmall2($doubleHalfSmall2)
    {
        $this->doubleHalfSmall2 = $doubleHalfSmall2;

        return $this;
    }

    /**
     * Get the value of sunsetSmall2
     */ 
    public function getSunsetSmall2()
    {
        return $this->sunsetSmall2;
    }

    /**
     * Set the value of sunsetSmall2
     *
     * @return  self
     */ 
    public function setSunsetSmall2($sunsetSmall2)
    {
        $this->sunsetSmall2 = $sunsetSmall2;

        return $this;
    }

    /**
     * Get the value of doubleFullMedium
     */ 
    public function getDoubleFullMedium()
    {
        return $this->doubleFullMedium;
    }

    /**
     * Set the value of doubleFullMedium
     *
     * @return  self
     */ 
    public function setDoubleFullMedium($doubleFullMedium)
    {
        $this->doubleFullMedium = $doubleFullMedium;

        return $this;
    }

    /**
     * Get the value of doubleHalfMedium
     */ 
    public function getDoubleHalfMedium()
    {
        return $this->doubleHalfMedium;
    }

    /**
     * Set the value of doubleHalfMedium
     *
     * @return  self
     */ 
    public function setDoubleHalfMedium($doubleHalfMedium)
    {
        $this->doubleHalfMedium = $doubleHalfMedium;

        return $this;
    }

    /**
     * Get the value of unpluggedCeremony
     */ 
    public function getUnpluggedCeremony()
    {
        return $this->unpluggedCeremony;
    }

    /**
     * Set the value of unpluggedCeremony
     *
     * @return  self
     */ 
    public function setUnpluggedCeremony($unpluggedCeremony)
    {
        $this->unpluggedCeremony = $unpluggedCeremony;

        return $this;
    }

    /**
     * Get the value of hairpinRecordPlayer
     */ 
    public function getHairpinRecordPlayer()
    {
        return $this->hairpinRecordPlayer;
    }

    /**
     * Set the value of hairpinRecordPlayer
     *
     * @return  self
     */ 
    public function setHairpinRecordPlayer($hairpinRecordPlayer)
    {
        $this->hairpinRecordPlayer = $hairpinRecordPlayer;

        return $this;
    }

    /**
     * Get the value of headTableKeepsake
     */ 
    public function getHeadTableKeepsake()
    {
        return $this->headTableKeepsake;
    }

    /**
     * Set the value of headTableKeepsake
     *
     * @return  self
     */ 
    public function setHeadTableKeepsake($headTableKeepsake)
    {
        $this->headTableKeepsake = $headTableKeepsake;

        return $this;
    }
}




?>