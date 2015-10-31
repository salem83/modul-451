<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => './assets/templates',
    'debug' => true,
	'view' => new \Slim\Views\Twig()
));

$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new \Twig_Extension_Debug(),

);

$twig = $app->view->getInstance();
$filter = new \Twig_SimpleFilter( 'MyFunc', function($val) {
    echo '---- ' . $val . '----';
});
$twig->addFilter( $filter );

$app->get( '/', function() use( $app ) {
    $t = 1;
    $app->view->setData( array( 'foo' => $t ) );
    $app->render( 'test.twig' );
});

 $app->run();