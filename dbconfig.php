<?php

$servername = "localhost";
$dbname= "data_project";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    function nouvelleRegion($pdo){
      $nRegion = "UPDATE musee SET region='GRAND EST' WHERE region='ALSACE' OR region='LORRAINE' OR region='CHAMPAGNE-ARDENNE' "
    }

 ?>
