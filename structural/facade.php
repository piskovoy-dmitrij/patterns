<?php

class TV {

    /**
     * @name on
     * @todo Включить
     */
    public function on(){
        //реализация
        return "tv in on </br>";
    }

    /**
     * @name off
     * @todo Включить
     */
    public function off(){
        //реализация
        return "tv in off </br>";
    }

    /**
     * @name setChanel
     * @todo Выбрнать канал
     */
    public function setChanel(){
        //реализация
        return "tv set new channel </br>";
    }
}

class Stereo {

    /**
     * @name on
     * @todo Включить
     */
    public function on(){
        //реализация
        return "stereo in on </br>";
    }

    /**
     * @name off
     * @todo Включить
     */
    public function off(){
        //реализация
        return "stereo in off </br>";
    }

    /**
     * @name tuneVolume
     * @todo Настроить громкость
     */
    public function tuneVolume(){
        //реализация
        return "stereo in tune volime </br>";
    }
}

class Lights {

    /**
     * @name on
     * @todo Включить
     */
    public function on(){
        //реализация
        return "lights are on </br>";
    }

    /**
     * @name off
     * @todo Включить
     */
    public function off(){
        //реализация
        return "lights are off </br>";
    }
}


/************************** сам фасад ******************************/

interface MovieControl {

    /**
     * @name beginWatching
     * @todo Смотреть фильм
     */
    public function beginWatching();

    /**
     * @name stopWatching
     * @todo Выключить
     */
    public function stopWatching();
}

class MovieWatcher implements MovieControl{

    /**
     * @var TV
     */
    public $tv;

    /**
     * @var Stereo
     */
    public $stereo;

    /**
     * @var Lights
     */
    public $lights;

    public function __construct(TV $tv, Stareo $stereo, Lights $lights){

        $this->tv = $tv;

        $this->stereo = $stereo;

        $this->lights = $lights;
    }

    /**
     * @name beginWatching
     * @todo Смотреть фильм
     */
    public function beginWatching(){

        $this->tv->on();
        $this->tv->setChanel();

        $this->stereo->on();
        $this->stereo->tuneVolume();

        $this->lights->off();
    }

    /**
     * @name stopWatching
     * @todo Выключить
     */
    public function stopWatching(){

        $this->tv->off();

        $this->stereo->off();

        $this->lights->on();
    }

}

/********************** Example *****************************/
$tv = new TV();
$stereo = new Stereo();
$lights = new Lights();

$movieWatcher = new MovieWatcher($tv, $stereo, $lights);
$movieWatcher->beginWatching();
$movieWatcher->stopWatching();