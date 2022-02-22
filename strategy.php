<?php

interface carCouponGenerator{
    public function addSeasonDiscount();
    public function addStockDiscount();
}

class bmwCuoponGenerator implements carCouponGenerator{
    
    private $discount;
    private $isHighSeason;
    private $bigStock;

    function __construct(){
        $this->discount = 0;
        $this->isHighSeason = false;
        $this->bigStock = true;
    }

    public function addSeasonDiscount(){
        if(!$this->isHighSeason) {$this->discount += 5;}
    }

    public function addStockDiscount(){
        if($this->bigStock) {$this->discount += 7;}
    }
    public function showDiscount(){
        if( $this->discount > 0 ) echo  '** Total1 descuento es: ' . $this->discount  . ' **<br>';
        else echo  'No existe ningún descuento <br>';

        return $this->discount;
    }
    
}

class mercedesCuoponGenerator implements carCouponGenerator{
    
    private $discount;
    private $isHighSeason;
    private $bigStock;

    function __construct(){
        $this->discount = 0;
        $this->isHighSeason = false;
        $this->bigStock = true;
    }

    public function addSeasonDiscount(){
        if(!$this->isHighSeason) {$this->discount += 4;}
    }

    public function addStockDiscount(){
        if($this->bigStock) {$this->discount += 10;}
    }
    public function showDiscount(){
        if( $this->discount > 0 ) echo  '** Total2 descuento es: ' . $this->discount  . ' **<br>';
        else echo  'No existe ningún descuento <br>';

        return $this->discount;
    }
    
}

class CocheNuevo {

    private $strategyInstance;
    
    public function __construct($instance)
    {
        $this->strategyInstance = $instance;
    }
    
    public function seasonDiscount()
    {
        $this->strategyInstance->addSeasonDiscount();
    }
    public function stockDiscount()
    {
        $this->strategyInstance->addStockDiscount();
    }

    public function showDiscount(){
        $this->strategyInstance->showDiscount();
    }
}

$cocheNuevoMercedes = new CocheNuevo(new mercedesCuoponGenerator());
$cocheNuevoMercedes->seasonDiscount();
$cocheNuevoMercedes->stockDiscount();
$cocheNuevoMercedes->showDiscount();

$cocheNuevoBmw = new CocheNuevo(new bmwCuoponGenerator());
$cocheNuevoBmw->seasonDiscount();
$cocheNuevoBmw->stockDiscount();
$cocheNuevoBmw->showDiscount();



?>