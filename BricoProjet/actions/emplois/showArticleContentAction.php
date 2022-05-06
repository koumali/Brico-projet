<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    $idOfemploi = $_GET['id'];

    $checkIfEmploiExists= $bdd->prepare('SELECT * FROM emplois WHERE id=?');
    $checkIfEmploiExists->execute(array($idOfemploi));
    
    if($checkIfEmploiExists->rowCount()>0){
        $emploisInfos = $checkIfEmploiExists->fetch();

        $emploi_title = $emploisInfos['titre'];
        $emploi_discription = $emploisInfos['description'];
        $emploi_content =$emploisInfos['content'];   
        $emploi_id = $emploisInfos['id_auteur'];
        $emploi_nom = $emploisInfos['nom_auteur'];
        $emploi_prenom = $emploisInfos['prenom_auteur'];
        $emploi_phone = $emploisInfos['phone_auteur'];
        $emploi_email = $emploisInfos['email_auteur'];
        $emploi_date = $emploisInfos['date_publication'];
        $emploi_image = $emploisInfos['image'];
        $like= $emploisInfos['like_count'];
        $dislike= $emploisInfos['count_dislike'];



    }else{
        $errorMsg = "Aucun pub n'a été trouvée";
    }  
}else{
    $errorMsg = "Aucun pub n'a été trouvée";
}