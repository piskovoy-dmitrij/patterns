<?php

/********************** Duck class and interface *****************************/
interface Duck {

    /**
     * @name quack
     * Duck can quack
     */
    public function quack();

    /**
     * @name fly
     * and fly
     */
    public function fly();
}

class MallardDuck implements Duck{

    /**
     * @name quack
     */
    public function quack()
    {
        echo "Quack!<br>";
    }

    /**
     * @name fly
     */
    public function fly()
    {
        echo "I'm flying!<br>";
    }
}

/********************** Turkey class and interface *****************************/
interface Turkey {

    /**
     * @name gobble
     */
    public function gobble();

    /**
     * @name fly
     */
    public function fly();
}

class WildTurkey implements Turkey {

    /**
     * @name gobble
     */
    public function gobble()
    {
        echo "Gobble gobble!<br>";
    }

    /**
     * @name fly
     */
    public function fly()
    {
        echo "I'm flying too!<br>";
    }
}

/********************** Adapter *****************************/
class TurkeyAdapter implements Duck {

    public $turkey = null;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    /**
     * @name quack
     */
    public function quack()
    {
        $this->turkey->gobble();
    }

    /**
     * @name fly
     */
    public function fly()
    {
        $this->turkey->fly();
    }
}


/********************** Example *****************************/
/**
 * Duck
 */
$duck = new MallardDuck();

/**
 * Turkey
 */
$turkey = new WildTurkey();

/**
 * Turkey-Duck
 */
$turkeyAdapter = new TurkeyAdapter($turkey);

//Test
$duck->quack();
$turkey->gobble();
$turkeyAdapter->quack();
