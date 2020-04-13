<?php
/*
 * Позволяет создать класс в роли аналога глобальной переменной,
 * которую могут использовать несколько классов. Статические свойства одинаковы
 * для нескольких созданных обьектов.
 */

class Container {
    private $props = array(); 
    private static $instance;
    
    /*
     * защита от вызова конструкта класса, что бы пресечь создания нескольких
     * экземпляров обьекта.
     */
    private function _construct() {
    }
    
    /*
     * Так как конструкт приватный, то нельзя извне создать обьект. Далее обьект
     * создаётся изнутри - вызывается конструкт new внутри метода. Self - 
     * используется что бы обратиться к статическому свойству.
     */
    public static function  getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new Container();
        }
        return self::$instance;
    }
    
    public function setProperty ($key, $val) {
        $this->props[$key] = $val;
    }
    
    public function getProperty ($key) {
        return $this->props[$key];
    }
}

$props = Container::getInstance();
$props->setProperty("name","Sam");
$props->setProperty("age", "55");
print_r($props->getProperty("age"));
PHP_EOL;
print_r($props->getProperty("name"));
