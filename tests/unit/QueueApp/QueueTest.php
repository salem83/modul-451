<?php

require_once 'class.Person.php';
require_once 'class.Queue.php';
require_once 'class.Utils.php';

class QueueApp_Queue extends PHPUnit_Framework_TestCase
{

// --- BirthDate ------------------------------------------------------------------------------------------------------
    public function testCreateQueue()
    {
        $queue = new \RMB\Classes\Queue();
        $this->assertEquals( 0, $queue->getLenght(), 'ERROR: Queue object not created' );
    }

    public function testAddRemovePerson() {

        $queue = new \RMB\Classes\Queue();

        $person1 = $this->getMockBuilder( '\RMB\Classes\Person' )
            ->setMethods( array( '__construct' ) )
            ->setConstructorArgs( array( 'Robin', 'Bachmann', '1983-03-30' ) )
            ->getMock();

        $this->assertEquals( 1, $queue->addPerson( $person1 ), '' );

        $person2 = $this->getMockBuilder( '\RMB\Classes\Person' )
            ->setMethods( array( '__construct' ) )
            ->setConstructorArgs( array( 'Robin', 'Bachmann', '1983-03-30' ) )
            ->getMock();

        $this->assertEquals( 2, $queue->addPerson( $person2 ) );



    }

    public function testRemovePerson() {
        $queue = new \RMB\Classes\Queue();
        $person1 = new \RMB\Classes\Person('Hans', 'Gugger', '1933-05-17');
        $person2 = new \RMB\Classes\Person('Vreni', 'Schär', '1941-01-20');
        $person3 = new \RMB\Classes\Person('Tobias', 'Elmont', '1992-10-10');
        $person4 = new \RMB\Classes\Person('Renato', 'Derosa', '1916-05-01');

        $queue->addPerson( $person1 );
        $queue->addPerson( $person2 );
        $queue->addPerson( $person3 );
        $queue->addPerson( $person4 );



        $this->assertEquals( 2, $queue->removePerson( $person2 ) );

    }

    public function testGetNextPerson() {

        $queue = new \RMB\Classes\Queue();
        $person1 = new \RMB\Classes\Person('Hans', 'Gugger', '1933-05-17');
        $person2 = new \RMB\Classes\Person('Vreni', 'Schär', '1941-01-20');

        $queue->addPerson( $person1 );
        $queue->addPerson( $person2 );

        $this->assertEquals( 'Gugger', $queue->getNextPerson()->getLastName() );

    }

}