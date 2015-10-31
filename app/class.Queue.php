<?php
namespace RMB\Classes;


class Queue {

    private $queue = array();

    public function __construct( $queue = null ) {
        if( isset( $queue ) ) {
            $this->queue = $queue;
        }
    }

	public function addPerson( $person ) {
        return array_push( $this->queue, $person );
    }

	public function removePerson( $person ) {
        if( ( $key = array_search($person, $this->queue) ) !== FALSE ) {
            unset( $this->queue[$key] );
        }
        return sizeof( $this->queue );
        /*
        $item = null;
        foreach($this->queue as $struct) {
            if ( ) {
                $item = $struct;
                break;
            }
        }
        */

    }

    public function getNextPerson() {
        /*
        $person = $this->queue[0];
        $this->removePerson( $person );
        return $person;
        */
        return array_shift( $this->queue );

    }

	public function getLenght() {
        return sizeof( $this->queue );
    }

    public function getQueue() {
        return $this->queue;

    }


}


?>