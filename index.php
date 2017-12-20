<?php
require 'vendor/autoload.php';
$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/', function() {
    require __DIR__ . '/views/home.php';
});

// map users details page
$router->map( 'GET|POST', '/users/[i:id]/', function( $id ) {
  $user = .....
  require __DIR__ . '/views/user/details.php';
});

?>
