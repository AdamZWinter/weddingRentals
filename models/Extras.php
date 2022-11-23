<?php

class Extras{
    private $extrasArrayStatus;
    private $extrasArrayLang;
    private $extrasPrices;
    private $extrasCode;

    public function __construct(){
        $this->extrasArrayStatus = array(
            FALSE,  //0
            FALSE,  //1
            FALSE,  //2
            FALSE,  //3
            FALSE,  //4
            FALSE,  //5
            FALSE   //6
        );

        $this->extrasArrayLang = array(
            "Hexagon Arbor",            //0
            "Vintage Sofa",             //1
            "Antique Gallon Jugs",      //2
            "XL Wine Jugs",             //3
            "Clear Antique Ball Jars",  //4
            "Blue Antique Ball Jars",   //5
            "Delivery"                  //6
        );

        $this->extrasPrices = array(
            350.00,                 //0
            99.00,                  //1
            40.00,                  //2
            20.00,                  //3
            30.00,                  //4
            30.00,                  //5
            80.00                   //6
        );

        $this->extrasCode = 0;
    }

    public function decode($extrasCode){
        //$this->extrasCode = $extrasCode;
        for($i = 0; $i < count($this->extrasArrayStatus); $i++){
            if( ($extrasCode & (1 << $i)) != 0 ){
                $this->setOptionStatus($i, TRUE);
            }
        }//end for
    }//end function

    public function getCode(){
        $this->extrasCode = 0;
        $i = 0;
        foreach($this->extrasArrayStatus as $included){
            if($included){
                $this->extrasCode = $this->extrasCode | (1 << $i);
            }
        $i++;
        }
        return $this->extrasCode;
    }

    public function setOptionStatus($index, $included){
        $this->extrasArrayStatus[$index] = $included;
    }

    public function getOptionStatus($index){
        return $this->extrasArrayStatus[$index];
    }

    public function getOptionQty($index){
        if($this->getOptionStatus($index)){
            return 1;
        }else{
            return 0;
        }  
    }

    public function getExtrasArrayLang(){
        return $this->extrasArrayLang;
    }

    public function getSelectedExtrasArrayLang(){
        $selectedArray = [];
        for($i = 0; $i < count($this->extrasArrayStatus); $i++){
            if($this->extrasArrayStatus[$i]){
                array_push($selectedArray, $this->extrasArrayLang[$i]);
            }
        }
        return $selectedArray;
    }

    public function getPricesArray(){
        return $this->extrasPrices;
    }

    public function getTotalExtrasPrice(){
        $total = 0.0;
        $i = 0;
        foreach($this->extrasArrayStatus as $included){
            if($included){$total = $total + $this->extrasPrices[$i];}
        }
        return $total;
    }
}


?>