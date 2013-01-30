<?php

/***************************************************/
interface Duck {

    /**
     * @name quack
     * Утка умеет крякать
     */
    public function quack();

    /**
     * @name fly
     * и летать
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

/***************************************************/
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
 * Утка
 */
$duck = new MallardDuck();

/**
 * Индюшка
 */
$turkey = new WildTurkey();

/**
 * Индюшка-утка
 */
$turkeyAdapter = new TurkeyAdapter($turkey);

//Тест
$duck->quack();
$turkey->gobble();
$turkeyAdapter->quack();
