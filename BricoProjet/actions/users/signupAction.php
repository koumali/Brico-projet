<?php
session_start();
require('actions/database.php');
// validation de formulaire
if(isset($_POST['validate'])){
    // vérifier si l'user a bien compléter tous es champs
    if(!empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['phone']) AND !empty($_POST['email']) AND !empty($_POST['job']) AND !empty($_POST['password'])){
        // les deonnes de l'user 
        $ran_id = rand(time(), 100000000);
        $user_nom = htmlspecialchars($_POST['lastname']);
        $user_prenom = htmlspecialchars($_POST['firstname']);
        $user_phone = htmlspecialchars($_POST['phone']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_job = htmlspecialchars($_POST['job']);
        $user_password =password_hash($_POST['password'], PASSWORD_DEFAULT);
        $status = "Active now";       
        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];           
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);
            $extensions = ["jpeg", "png", "jpg","JPEG", "PNG", "JPG"];
            // vérifier si l'utilisateur exuiste déja sur le site
            $checkifuseralereadyexists = $bdd->prepare('SELECT email FROM user WHERE email = ?');
            $checkifuseralereadyexists->execute(array($user_email));      
            if($checkifuseralereadyexists->rowCount() == 0){
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png","image/JPEG", "image/JPG", "image/PNG"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, 'img/'. $new_img_name)){     
                            // inserer l'utilisateur dans le bdd
                            $insertuseronwebsite = $bdd->prepare('INSERT INTO user(unique_id, nome, prenom, phone, email, metier, mdp, image, status) VALUES(?,?,?,?,?,?,?,?,?)');
                            $insertuseronwebsite->execute(array($ran_id, $user_nom, $user_prenom, $user_phone, $user_email, $user_job, $user_password, $new_img_name, $status));
                            // recuperer les informations de l'utilisateur
                            $getinfosofthisuser = $bdd->prepare('SELECT * FROM user WHERE nome=? and prenom =? and email=?');
                            $getinfosofthisuser->execute(array($user_nom, $user_prenom, $user_email));
                            $userinfos = $getinfosofthisuser->fetch();
                            // authenification sur le  site et récuperer ses donnees dans des variables globales session
                            $_SESSION['auth'] = true;   
                            $_SESSION['id'] = $userinfos['id'];
                            $_SESSION['unique_id']=$userinfos['unique_id'];
                            $_SESSION['lastname'] = $userinfos['nome'];
                            $_SESSION['firstname'] = $userinfos['prenom'];
                            $_SESSION['email'] = $userinfos['email'];
                            $_SESSION['image'] = $userinfos['image'];
                            $_SESSION['status'] = $userinfos['status'];
                            // rederger l'user vers home page
                            header('Location: index.php');
                        }else {$errorMsg= "error";}
                    }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
                }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
            }else{$errorMsg= "utilisateur existe déja sur le site"; }              
        }else{$errorMsg= "Please upload an image file";} 
    }else{ $errorMsg= "vouillez remplire tous les champs...";}
}