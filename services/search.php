<?php

function search($pdo, $word){
    
	$stmt = $pdo->prepare('SELECT * FROM musee WHERE ville LIKE "%":word"%" OR nom_du_musee LIKE "%":word"%" ');
    $stmt->bindParam(':word', $word, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return ($result);

}

        

?>