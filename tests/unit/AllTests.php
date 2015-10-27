<?php

require_once 'QueueApp/PersonTest.php';


class AllTests
{
	public static function main()
	{
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}

	public static function suite()
	{
		$suite = new PHPUnit_Framework_TestSuite('QueueApp');
		$suite->addTest('QueueApp_PersonTest');
	}
}