<?php

function getMuseumByLand($pdo, $region){

    $stmt = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $region);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return  $result;
}

function getPartsMusees($pdo,$region, $page, $max){

  $stmt = $pdo->prepare("SELECT COUNT(*) AS nb_musees FROM musee WHERE nom_reg = :region");
  $stmt->bindParam(':region', $region);
  $stmt->execute();
  $nb_result = $stmt->fetch();
  $nb_pages = round((intval($nb_result["nb_musees"]) / intval($max)));
  $offset = $page * $max;

  $stmt1 = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region LIMIT :m OFFSET :off;");
  $stmt1->bindParam(':region', $region);
  $stmt1->bindParam(':m', $max, PDO::PARAM_INT);
  $stmt1->bindParam(':off', $offset,PDO::PARAM_INT);
  $stmt1->execute();

  $page_results = $stmt1->fetchAll();
  $infos = [];
  $infos['pages'] = intval($nb_pages);
  $infos['current_pages'] = intval($page);
  $infos['results'] = $page_results;
  return $infos;
}


function getIdByMusee($pdo, $id){

    $stmt = $pdo->prepare("SELECT * FROM musee WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return  $result;
}

function getRegion($pdo, $region){
    $stmt = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $region);
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

