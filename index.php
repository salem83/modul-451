<?php
session_start();

require __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/app/class.Person.php';
require_once __DIR__.'/app/class.Queue.php';

$app = new \Slim\Slim(array(
    'templates.path' => './assets/templates',
    'mode' => 'development',
    'debug' => true,
	'view' => new \Slim\Views\Twig()

));

$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());
$app->hook('slim.before', function () use ($app) {
    $app->view->setData( array('baseUrl' => 'http://lol:88/CSBE/QueueApp/' ) );
});
$app->hook('slim.before.dispatch', function () use ($app) {
	$app->render( 'header.twig' );
});
$app->hook('slim.after.dispatch', function () use ($app) {
	$app->render( 'footer.twig' );
});


$currentQueue = ( isset( $_SESSION['queue'] ) ? unserialize( $_SESSION['queue'] ) : null );
$myQueue = new RMB\Classes\Queue( $currentQueue );

echo var_dump( $_SESSION );
echo var_dump( $_POST );

// GET route
$app->get( '/kill', function() use( $app ) {
    session_destroy();
});

$app->get( '/', function() use( $app, $myQueue ) {
    $app->view->setData( array( 'queueCount' =>  $myQueue->getLenght() ) );
    $app->render( 'main.twig' );
});

$app->post( '/(:action)', function($action) use( $app, $myQueue ) {

    switch( $action ){
        case 'addPerson':
            $person = new \RMB\Classes\Person( $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'] );
            $myQueue->addPerson( $person );
            break;
        case 'callPerson':

            break;

        default:
    }

    $_SESSION['queue'] = serialize( $myQueue->getQueue() );

    $app->view->setData( array(
        'queueCount' => $myQueue->getLenght(),
        'persons' => $myQueue->getQueue()
    ));





    $app->view->setData( array('queueCount' => 10 ) );
    $app->render( 'main.twig' );
});






 $app->run();