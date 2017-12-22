<?php

function getMuseumByLand($pdo, $region){
    
    
    $stmt = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $region);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;
    
}

function getRegion($pdo, $region){
    
    
    $stmt = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $regions);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;
    
}


function getDepartements($pdo){

	$stmt = $pdo->prepare("SELECT DISTINCT nom_dep  FROM musee ");
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;

}

function getAllReg($pdo){

	$stmt = $pdo->prepare("SELECT DISTINCT nom_reg  FROM musee ");
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;

}





function getGroup($pdo){

	$stmt = $pdo->prepare("SELECT nom_reg, fonction nom_dep FROM musee");
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;

}

function getDepByReg($pdo, $region){

	$stmt = $pdo->prepare("SELECT DISTINCT nom_dep FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $region);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;

}


?>

