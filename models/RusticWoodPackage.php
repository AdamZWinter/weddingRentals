<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// exmaple:  Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class RusticWoodPackage extends ParentPackage{

    public function __construct(){
        $this->packageCode = 5;
        $this->subsetType = 0;  //a la cart
        $this->setName = "rusticwood";
        $this->setNameLang = "Rustic Wood";

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
                                        "Pick Six",      //32
                                        "Pick Four"  //48
                                        );

        $this->subsetPricesArray = array(299.00,
                                        245.00,
                                        199.00
                                        );

        $this->optionStatusArray = [];
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            array_push($this->optionStatusArray, FALSE);
        }
    }

    
}//end class




?>