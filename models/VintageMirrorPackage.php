<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class VintageMirrorPackage extends ParentPackage{

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

        $this->subsetPricesArray = array(849.00,
                                        799.00,
                                        649.00,
                                        599.00
                                        );

        $this->optionStatusArray = [];
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            array_push($this->optionStatusArray, FALSE);
        }
    }

}//end class


?>