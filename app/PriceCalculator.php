<?php

namespace App;

class PriceCalculator
{

    const PRICEARRAY = array(
        "minimum" => 1,
        "comission_ratio" => 0.11,
        "price_with_comission" => 1.11
    );

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
        if ( (int) ($this->courierPrice * self::PRICEARRAY['comission_ratio'] ) <= (int)(self::PRICEARRAY['minimum']) )
        {
            $this->publicPrice = $this->courierPrice + self::PRICEARRAY['minimum'];
            $this->comission = self::PRICEARRAY['minimum'];
        }
        else
        {
            $this->publicPrice = floor($this->courierPrice * self::PRICEARRAY['price_with_comission']);
            $this->comission = floor($this->courierPrice * self::PRICEARRAY['comission_ratio'] );
        }
    }
}
