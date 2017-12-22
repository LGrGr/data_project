<?php

function getMuseumByLand($pdo, $region){
    
    
    $stmt = $pdo->prepare("SELECT * FROM musee WHERE nom_reg = :region");
    $stmt->bindParam(':region', $region);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    return  $result;
    
}

?>