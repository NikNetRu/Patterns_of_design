<?php
/*
 * Decorator - идея в том, что при наличии некоего абстрактного класа/интерфейса А, 
 * и его реализации, возникает потребность расширить функционал, так что бы 
 * сначала выполнялся расширенный класс, а затем новая реализция. Создаётся
 * декоратор который расширяет абстрактный класс А и содержит конструкт(или ссылку)
 * на этот абстрактный класс А.
 */

/*
 * суперкласс
 */
abstract class Tile {
    abstract function  getWealthFactor();
}

/*
 * его реализаци
 */
class Plains extends Tile {
    function getWealthFactor() {
        return 4;
    }
}

/*
 * декоратор
 */

abstract class TileDecorator extends Tile {
    protected $tile;
    
    function __construct(Tile $tile) {
        $this->tile = $tile;
    }
}

/*
 * Расширяем Plains через декоратор
 */

class Diamond extends TileDecorator {
    function getWealthFactor() {
        return $this->tile->getWealthFactor()-1;
    }
}

$tile = new Plains;
print_r($tile->getWealthFactor());

$diamon = new Diamond($tile);
print_r($diamon->getWealthFactor());
