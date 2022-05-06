<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfEmploi = $_GET['id'];

    $checkIfEmploiExists = $bdd->prepare('SELECT * FROM emplois WHERE id=?');
    $checkIfEmploiExists->execute(array($idOfEmploi));
    
    if($checkIfEmploiExists->rowCount() > 0){

        $emploiInfos = $checkIfEmploiExists->fetch();
        if($emploiInfos['id_auteur'] == $_SESSION['id']){

            $emploi_title = $emploiInfos['titre'];
            $emploi_description = $emploiInfos['description'];
            $emploi_content = $emploiInfos['content'];
            
            
            $emploi_description = str_replace('<br />', '', $emploi_description);
            $emploi_content = str_replace('<br />', '', $emploi_content);
        }else{
            $errorMsg ="vous n'estes pas l'auteur de cette publication";
        }
    }else{
        $errorMsg = "Aucun publication n'a été trouvée";
    }  
}else{
    $errorMsg = "Aucun publication n'a été trouvée";
}