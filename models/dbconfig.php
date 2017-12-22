<?php

$servername = "localhost";
$dbname= "musee";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully";*/
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

  

 ?>
