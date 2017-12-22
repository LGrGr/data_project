<?php

require "./vendor/autoload.php";



$router = new AltoRouter();


$router->setBasePath('data_project/');



$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, array(
    'cache' => false,
));



$router->map( 'GET', '/', function() {


    global $twig;


    $template = $twig->load('basic.html.twig');
    $data = ['Lucie', 'Floriane', 'Magalie', 'Antoine', 'Mourad'];

    $params =["tab" => $data];

    echo $template->render($params);

});


$router->map( 'GET', '/test', function() {

    echo "vous etes sur test !!";



});





$router->map( 'GET', '/home', function() {

     global $twig;
     $template = $twig->load('home.html.twig');

     echo $template->render();

});







$router->map( 'GET', '/region/[a:region]', function($region) {

        include_once './services/Utils.php';

        $new_region =  Utils::parseRegion($region);







        if($new_region == false){

            header("Location: http://localhost/data_project/home");

        }else{

              include_once './models/dbconfig.php';
              include_once './models/musees.php';

              $data = getMuseumByLand($pdo, $new_region);
              $depByReg =  getDepByReg($pdo, $new_region);
              $Reg = getAllReg($pdo);
              $regions = getRegion($pdo, $region);


              global $twig;
              $template = $twig->load('list-regions.html.twig');

              echo $template->render([
                  'musees' => $data,
                  'region' => $Reg,
                  'departements' =>  $depByReg,
                  'reg' => $new_region



              ]);

        }

});



$router->map( 'GET', '/ajax/dep/[a:departements]', function() {

    echo "vous etes sur test !!";



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
