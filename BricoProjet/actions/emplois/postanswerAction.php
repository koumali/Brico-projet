<?php

require('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, nom_auteur, prenom_auteur, id_emploi, content) VALUES(?,?,?,?,?)');
        $insertAnswer->execute(array($_SESSION['id'],$_SESSION['lastname'],$_SESSION['firstname'],$idOfemploi,$user_answer));
    }
}