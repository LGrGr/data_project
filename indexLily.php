<?php
require 'vendor/autoload.php';

$router = new AltoRouter();

$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

$router->setBasePath('data_project/');



$router->map( 'GET', '/test', function() {

        global $twig;


        $template = $twig->load('carte.html.twig');
        echo $template->render();

});


$router->map( 'GET', '/toto', function() {

        echo "test";

});





























// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}





 ?>
