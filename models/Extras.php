<?php

class Extras{
    private $extrasArrayStatus;
    private $extrasArrayLang;
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

        $this->extrasCode = 0;
    }

    public function decode($extrasCode){
        $this->extrasCode = $extrasCode;
        for($i = 0; $i < count($this->extrasArrayStatus); $i++){
            if( ($this->extrasCode & (1 << $i)) != 0 ){
                $this->setOptionStatus($i, TRUE);
            }
        $i++;
        }
    }

    public function getCode(){
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
}


?>