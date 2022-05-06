<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}
require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfEmploi = $_GET['id'];

        $checkIfEmploiExists = $bdd->prepare('SELECT id_auteur FROM emplois WHERE id = ?');
        $checkIfEmploiExists->execute(array($idOfEmploi));

        if($checkIfEmploiExists->rowCount() > 0){
            
            $emploiInfo =$checkIfEmploiExists->fetch();
            
            if($emploiInfo['id_auteur'] == $_SESSION['id']){
                $deleteThisEmploi = $bdd->prepare('DELETE FROM emplois WHERE id = ?');
                $deleteThisEmploi->execute(array($idOfEmploi));
                header('Location: ../../mes-offres.php');

            }

        }
        
}