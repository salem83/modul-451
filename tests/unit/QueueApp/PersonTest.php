<?php

require_once 'class.Person.php';
require_once 'class.Utils.php';


class QueueApp_Person extends PHPUnit_Framework_TestCase
{

// --- BirthDate ------------------------------------------------------------------------------------------------------
	public function testSetBirthDate()
	{
		$person = new RMB\Classes\Person( );
        // correct date
        $this->assertInstanceOf( get_class( $person ), $person->setBirthDate( '1983-03-30' ), 'ERROR: no/ivalid object returned' );
        // invalid date
        $this->assertNull( $person->setBirthDate( '1983-02-30' ), 'ERROR: invalid date' );
        // invalid string .
        $this->assertNull( $person->setBirthDate( '1983.03.30' ), 'ERROR: dot as separator' );
        // invalid string
        $this->assertNull( $person->setBirthDate( 'asdasda sdad', 'ERROR: string not allowed' ) );
        // too old
        $this->assertNull( $person->setBirthDate( '1899-12-31' ), 'ERROR: date too old' );
        // too present
        $ts = new DateTime(  );
        $ts->modify( '+1 day' );
        $this->assertNull( $person->setBirthDate( $ts->format( 'd-m-Y' ) ), 'ERROR: date in the future' );
    }

    public function testGetBirthDate() {
        $person = new RMB\Classes\Person( );
        $person->setBirthDate( '1983-03-30' );
        $this->assertRegExp( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $person->getBirthDate( ), 'ERROR: invalid date' );
    }

// --- FirstName ------------------------------------------------------------------------------------------------------
    public function testSetFirstName() {

        $person = new RMB\Classes\Person( );
        // valid name
        $this->assertInstanceOf( get_class( $person ), $person->setFirstName( 'Biland' ), 'ERROR: Name is invalid' );
        // i don't like numbers
        $this->assertNull( $person->setFirstName( '123546' ), 'ERROR: nums not allowed' );
        // nice but invalid
        $this->assertNull( $person->setFirstName( 'BI???D' ), 'ERROR: invalid characters' );

    }
    public function testGetFirstName() {
        $person = new RMB\Classes\Person( );
        $person->setFirstName( 'Biland' );
        $this->assertInternalType( 'string', $person->getFirstName() );
    }

// --- LastName -------------------------------------------------------------------------------------------------------

    public function testSetLastName() {

        $person = new RMB\Classes\Person( );
        // valid name
        $this->assertInstanceOf( get_class( $person ), $person->setLastName( 'Eyuieux' ), 'ERROR: No/invalid object returned' );
        // i don't like numbers
        $this->assertNull( $person->setFirstName( 'E171eu5' ), 'ERROR: invalid name' );
        // nice but invalid
        $this->assertNull( $person->setFirstName( '???????' ), 'ERROR: invalid characters' );

    }

    public function testGetLastName() {
        $person = new RMB\Classes\Person( );
        $person->setLastName( 'Biland' );
        $this->assertInternalType( 'string', $person->getLastName() );
    }


}