<?php
/**
 * Created by PhpStorm.
 * User: mrt
 * Date: 17.10.2015
 * Time: 17:27
 */

namespace RMB\Classes;


include_once __DIR__.'/class.Person.php';
include_once __DIR__.'/class.Queue.php';



class QueueApp {

    protected $_queue;

    function __construct( $queue ) {

        if( isset( $queue ) ) {
            $this->_queue = new \RMB\Classes\Queue( $queue );
        } else {
            $this->_queue = new \RMB\Classes\Queue();
        }
    }

    function addPerson( $oPerson ) {
        $this->_queue->addPerson( $oPerson );
    }

    function callPerson() {
        $person = $this->_queue->getNextPerson();
        $_SESSION['queue'] = serialize( $this->_queue );
        return $person;
    }

    function getQueue() {
        return $this->_queue;

    }

}