<?php
namespace Composite;
/*
 * Идея в том что бы обращение с одним обьектом, было такое же, как и с группой
 * обьектов.
 * Общий класс Unit, на базе которого образуется и сами обьекты и класс который
 * их обьединяет.
 */

abstract class Unit {
    abstract function addUnit (Unit $unit);
    abstract function removeUnit (Unit $unit);
    abstract function bombardStrength ();
}

class Army extends Unit {
    private $units = array();
    
    function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)){
            return;
        }
        $this->units[] = $unit;
    }
    
    function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, array($unit),
                                    function ($a, $b) {return ($a === $b)?0:1;});
    }
    
    function bombardStrength() {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrenght;
        }
        return $ret;
    }
}
/*
 * Недостаток в создании исключений для функций "листьев"
 */
class Archer extends Unit {
    function addUnit(Unit $unit) {
        throw new Exception('Недоступно');
    }
    function removeUnit(Unit $unit) {
        throw new Exception('Недоступно');
    }
    function bombardStrength (){
        return 4;
    }
}

/*
 * Даллее улучшенная реализация шаблона, классы композиты выделяются в отдельный
 * класс, юниты расширяют класс Unit, а из композиты - отряды, армии и т.п,
 * CompositeUnits.
 */
namespace CompositeImproved;

abstract class Unit {
    function getComposite() {
        return null;
    }
    
    abstract function bombardStrenght();
}

abstract class CompositeUnit extends Unit { 
    private $units = array();
    
    function getComposite () {
        return $this;
    }
    
    function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)){
            return;
        }
        $this->units[] = $unit;
    }
    
    function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, array($unit),
                                    function ($a, $b) {return ($a === $b)?0:1;});
    }
    
    
}