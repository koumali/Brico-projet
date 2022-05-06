<?php
session_start();
require('actions/database.php');

// validation de formulaire
if(isset($_POST['validate'])){
    // vérifier si l'user a bien compléter tous es champs
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        // les deonnes de l'user 
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);
       
        $checkifuserexists= $bdd->prepare('SELECT * FROM user WHERE email = ?');
        $checkifuserexists->execute(array($user_email));
        if($checkifuserexists->rowCount() > 0){

            $userinfos = $checkifuserexists->fetch();

            if(password_verify($user_password , $userinfos['mdp'])){
                // authenification sur le  site et récuperer ses donnees dans des variables globales session
                $status = "Active now";
                $sql= $bdd->prepare(" UPDATE user SET status = '{$status}' WHERE unique_id = {$userinfos['unique_id']}");
                $sql->execute(array($user_email));
                
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userinfos['id'];
                $_SESSION['unique_id']=$userinfos['unique_id'];
                $_SESSION['lastname'] = $userinfos['nome'];
                $_SESSION['firstname'] = $userinfos['prenom'];
                $_SESSION['email'] = $userinfos['email'];
                $_SESSION['phon'] = $userinfos['phone'];
                $_SESSION['job'] = $userinfos['metier'];
                $_SESSION['image'] = $userinfos['image'];
                $_SESSION['status'] = $userinfos['status'];
                header('Location: index.php');
            }else{
                $errorMsg="Your password or email is incorrect...";
            }
        }else{
            $errorMsg="Your password or email is incorrect...";
        }
    }else{
        $errorMsg= "Please complete all fields...";
    }
}

