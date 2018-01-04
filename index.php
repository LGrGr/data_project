<?php

require "./vendor/autoload.php";


function checkDeadLink ($url) { 

    $a = @get_headers($url); 
    if ($a) { 
    //*** On a retour : on test le header HTTP 
    if (strstr($a[0],'404')) 
    return FALSE; // Erreur 404 
    else 
    return TRUE; // OK 
    } 
    else 
    return FALSE; // Erreur accès au site 
    }

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

    $dir    = './views/images_musees';
    $files1 = scandir($dir);
 


    if (in_array($musee[0]['id'].".png", $files1)) {
        $path_image = $musee[0]['id'].".png";
    }else{

        $path_image = null;

    }

     global $twig;
     $template = $twig->load('description.html.twig');

    if(!checkDeadLink($musee[0]['site_web'])){
        $musee[0]['site_web'] = '#'; 
    }
     echo $template->render([
                           'deps' => $dep,
                           'musee' => $musee[0],
                           'image' => $path_image
                           ]);
    
});




$router->map( 'GET', '/region/[a:region]/[i:page]', function($region,$page) {

        $max = 12;

        include_once './services/Utils.php';

        $new_region =  Utils::parseRegion($region);
        $new_region2 = $region; 

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
                  'precedent' => $precedent, 
                  'reg2'=> $new_region2
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
