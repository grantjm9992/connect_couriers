<?php

namespace App;

class PriceCalculator
{
    public $publicPrice;
    public $courierPrice;
    public $commission;

    public function __construct($inputPrice, $is_base = true)
    {
        if ( $is_base === true )
        {
            $this->courierPrice = $inputPrice;
            return $this->fromBase();
        }
        else
        {
            return $this->fromGross();
        }
    }

    public function fromBase()
    {
        if ( $this->courierPrice <= 50 )
        {
            $this->publicPrice = $this->courierPrice + 5;
            $this->comission = 5;
        }
        else
        {
            $this->publicPrice = floor($this->courierPrice * 1.11);
            $this->comission = floor($this->courierPrice * 0.11 );
        }
    }
}
