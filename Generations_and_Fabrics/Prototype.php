<?php

/* 
 * Решает проблему группировки обьектов с сильными родственными отношениями,
 * путём создания одной фабрики на все обьекты. Фабрика инициализирует обькты,
 * хранит их, и выдаёт по требованию их клоны.
 */

class Sea {}
class EarthSea extends Sea {}
class MarsSea extends Sea {}

class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}

class Forest {}
class EarthForest extends Forest {}
class MarsForest extends Forest {}

class TerrainsFactory {
    private $sea;
    private $plains;
    private $forest;
    
    function __construct( Sea $sea, Plains $plains, Forest $forest) {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }
    
    function getSea () {
        /*
         * поверхностное клонирование. Ссылки на другие обьекты внутри
         * $this->sea сохранятся
         */
        return clone $this->sea;
    }
    
    function getPlains () {
        return clone $this->plains;
    }
    
    function getForest () {
        return clone $this->forest;
    }
}