<?php

set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	'../../app',
)));

require_once 'PHPUnit/Autoload.php';
