<?php

require "./vendor/autoload.php";



$router = new AltoRouter();


$router->setBasePath('data_project/');



$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, array(
    'cache' => false,
    'debug' => true
));
$twig->addExtension(new Twig_Extension_Debug());



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

$router->map( 'GET', '/description/[i:id]', function($id) {


   include_once './models/dbconfig.php';
   include_once './models/musees.php';

  $dep = getDepartements($pdo);
  $musee = getIdByMusee($pdo, $id);


     global $twig;
     $template = $twig->load('description.html.twig');

     echo $template->render([
                           'deps' => $dep,
                           'musee' => $musee[0]
                           ]);
    
});




$router->map( 'GET', '/region/[a:region]/[i:page]', function($region,$page) {

        $max = 10;

        include_once './services/Utils.php';

        $new_region =  Utils::parseRegion($region);

        if($new_region == false){

            header("Location: http://localhost/data_project/home");

        }else{

              include_once './models/dbconfig.php';
              include_once './models/musees.php';

              $data =getPartsMusees($pdo, $new_region,$page,$max);
              $depByReg =  getDepByReg($pdo, $new_region);
              $Reg = getAllReg($pdo);
              $regions = getRegion($pdo, $region);



              $musees = $data["results"];
              $current_page =  $data["current_pages"]; 
              $nb_pages = $data["pages"];

              $suivant = $current_page+1;
             
              


              $precedent = $current_page-1;


              global $twig;
              $template = $twig->load('list-regions.html.twig');

              echo $template->render([
                  'musees' => $musees,
                  'region' => $Reg,
                  'current_page' => $current_page,
                  'nb_pages' => $nb_pages,
                  'departements' => $depByReg,
                  'reg' => $new_region,
                  'suivant' => $suivant,
                  'precedent' => $precedent
              ]);

        }

});



$router->map( 'GET', '/ajax/dep/[a:departements]', function() {

    echo "vous etes sur test !!";

});

/*-----------------------------------------------------Lucie ------------------------------------------------------------------------------------*/

































// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}


/*-----------------------------------------------------------------------------Antoine---------------------------------------------------------------------------------------*/
?>
