<?php

interface Coffee {

    /**
    * @name getCost
    * @todo Возвращает стоимость
    * @return double
    */
    public function getCost();
}

class Espresso implements Coffee{

    public $cost = 20;

    /**
    * @name getCost
    * @todo Возвращает стоимость
    * @return double
    */
    public function getCost(){
     return $this->cost;
    }
}

class Kapuchino  implements Coffee{

    public $cost = 15;

    /**
    * @name getCost
    * @todo Возвращает стоимость
    * @return double
    */
    public function getCost(){
        return $this->cost;
    }
}

abstract class Condiments implements Coffee {

    /**
     * @name getCost
     * @todo Возвращает стоимость
     * @return double
     */
    public function getCost(){
        //.....
    }
}
class HasMilk extends Condiments{

    public $coffee;

    public function __construct(Coffee $coffee){
        $this->coffee = $coffee;
    }

    /**
     * @name getCost
     * @todo Возвращает стоимость
     * @return double
     */
    public function getCost(){
        return 5 + $this->coffee->getCost();
    }
}

class HasSugar extends Condiments{

    public $coffee;

    public function __construct(Coffee $coffee){
        $this->coffee = $coffee;
    }

    /**
     * @name getCost
     * @todo Возвращает стоимость
     * @return double
     */
    public function getCost(){
        return 3 + $this->coffee->getCost();
    }
}

/********************** Example *****************************/
$espresso = new Espresso();
$kapuchino = new Kapuchino();
$espressoWithMilk = new HasMilk($espresso);
$kapuchinoWithMilk = new HasMilk($kapuchino);
$kapuchinoWithMilkWithSugar = new HasSugar($kapuchinoWithMilk);

echo $espresso->getCost()."руб. <br>";
echo $kapuchino->getCost()."руб. <br>";
echo $espressoWithMilk->getCost()."руб. <br>";
echo $kapuchinoWithMilk->getCost()."руб. <br>";
echo $kapuchinoWithMilkWithSugar->getCost()."руб. <br>";