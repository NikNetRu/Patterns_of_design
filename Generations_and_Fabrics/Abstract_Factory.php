<?php
/*
 * В дополнении к Fabrics Method добавляется древовидность к CommsManager,
 * теперь мы можем написать несколько реализаций, в которых функции getApptEncoder,
 * и дд. имеют различные реализации.
 */


abstract class CommsManager {
    
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getTtdEncoder();
    abstract function getContactEncoder();
    abstract function getFootertext();
}

class BlogsCommsManager extends CommsManager {
    function getHeaderText() {
        ;
    }
    
    function getApptEncoder() {
        return new BlogsApptEncoder;
    }
    
    function getTtdEncoder() {
        return new BlogsTtdEncoder;
    }
    
    function getContactEncoder() {
        return new BlogsContactEncoder;
    }
    
    function getFootertext() {
        ;
    }
}

class MegaCommsManager extends CommsManager {
    function getHeaderText() {
        ;
    }
    
    function getApptEncoder() {
        return new MegaApptEncoder;
    }
    
    function getTtdEncoder() {
        return new MegaTtdEncoder;
    }
    
    function getContactEncoder() {
        return new MegaContactEncoder;
    }
    
    function getFootertext() {
        ;
    }
    
}

/*
 * Для урощения принято сокращать код флагами:
 * 
   abstract class CommsManager {
 * const APPT = 1;
 * const TTD = 2;
 * const CONTACT = 3;
    abstract function getHeaderText() {
        ;
    }
    
    abstract function make($flag) {
    }
    
    abstract function getFootertext() {
        ;
    }
}
 */