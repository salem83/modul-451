<?php

/**
 * Created by PhpStorm.
 * User: mrt
 * Date: 14.10.2015
 * Time: 20:08
 */



namespace RMB\Classes;

class Person
{

    private $firstname;
    private $lastname;
    private $birthdate;

    function __construct( $firstname = null, $lastname = null, $birthdate = null ) {
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->birthdate    = $birthdate;
    }

    // --- firstname --------------------------------------------------------------------
    function getFirstName()
    {
        return $this->firstname;
    }

    function setFirstName( $firstname )
    {
        if (preg_match('/^\p{L}+$/', $firstname)) {
            $this->firstname = $firstname;
            return $this;
        }
        return null;
    }

    // --- lastname ---------------------------------------------------------------------
    function getLastName() {
        return $this->lastname;
    }

    function setLastName( $lastname ) {
        if (preg_match('/^\p{L}+$/', $lastname)) {
            $this->lastname = $lastname;
            return $this;
        }
        return null;
    }

    // --- birthdate --------------------------------------------------------------------
    function getBirthDate() {
        return $this->birthdate;
    }

    function setBirthDate( $birthdate ) {
        // check format
        if( preg_match( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $birthdate ) )
        {
            // check date range and validity of date
            list( $year, $month, $day ) = explode( '-', $birthdate );
            if( checkdate($month, $day, $year)
                && ( $birthdate >= '1900-01-01' )
                && ( $birthdate <= date( 'Y-m-d' ) )

            ){
                $this->birthdate = (string)$birthdate;
                return $this;
            }
        }
        return null;
    }


    // http://stackoverflow.com/questions/4478661/getter-and-setter
    /*
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    */
}




