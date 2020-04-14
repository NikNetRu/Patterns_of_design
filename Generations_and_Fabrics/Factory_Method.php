<?php
/*
 * Данный шаблон предназначени для создания нескольких реализций, на основе 
 * базового абстрактного класса. Легко растёт в горизонтальном направлении.
 * Его недосток громоздкость, дублирование кода.
 */

/*
 * Класс содержит базовый функционал, который преобразует данные для
 * использования в приложении.
 */
abstract class ApptEncoder {
    abstract function encode();
}
/*
 * Реализация базового функционала
 */
class BlogsApptEncoder extends ApptEncoder {
    function encode (){
        return "данные кодируются BlogsApptEncoder";
    }
}

class CalendarApptEncoder extends ApptEncoder {
    function encode (){
        return "данные кодируются CalendarApptEncoder";
    }
}

/*
 * Класс использует ApptEncoder, не имея представления о его реализациях
 */
abstract class CommsManager {
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getFooterText();
}

class BlogsCommsManager extends CommsManager {
    
    function getHeaderText() {
        return "Blogs";
    }
    function getApptEncoder() {
        return new BlogsApptEncoder();
    }
    function getFooterText() {
        return "Footer";
    }
}