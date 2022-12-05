<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining 24 bits]               [4 bits]    [4 bits] 
//
// Set:  1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// Package 16 = Full Set, 32 = Pick Six, 48 = Pick Four,  64 = platinum
// 256 and above will individual bit flags for the package choices

class LayeredArchPackage extends ParentPackage{

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
                                            "\"Mr & Mrs\" Custom Head Table Keepsake is a free gift in addition to the items above"
                                            );
        
        $this->subsetTypeArray = array("Full Set",   //16
                                        "Pick Six",  //32
                                        "Pick Four" //48
                                        );

        $this->subsetPricesArray = array(849.00,
                                        749.00,
                                        649.00
                                        );


        $this->optionStatusArray = [];
        for($i=0; $i<count($this->packageOptionsArray); $i++){
            array_push($this->optionStatusArray, FALSE);
        }
    }


}//end class




?>