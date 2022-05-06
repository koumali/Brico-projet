<?php
session_start();
require('actions/database.php');



if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content']) AND isset($_FILES['image'])){
        $emploi_title = htmlspecialchars($_POST['title']);
        $emploi_discription = nl2br(htmlspecialchars($_POST['description']));
        $emploi_content = nl2br(htmlspecialchars($_POST['content']));
        $emploi_id = $_SESSION['id'];
        $emploi_nom = $_SESSION['lastname'];
        $emploi_prenom = $_SESSION['firstname'];
        $emploi_phone = $_SESSION['phon'];
        $emploi_email = $_SESSION['email'];
        $emploi_date = date('d/m/Y');
        
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg","JPEG", "PNG", "JPG"];
        if(in_array($img_ext, $extensions) === true){
            $types = ["image/jpeg", "image/jpg", "image/png","image/JPEG", "image/JPG", "image/PNG"];
            if(in_array($img_type, $types) === true){
                $time = time();
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name, 'imgOffer/'. $new_img_name)){     
                // inserer l'offer dans le bdd


                $insertemploionwibsite = $bdd->prepare('INSERT INTO emplois(titre, description, content, id_auteur, nom_auteur, prenom_auteur, phone_auteur, email_auteur, date_publication, image) VALUES(?,?,?,?,?,?,?,?,?,?)');
                $insertemploionwibsite->execute(
                    array(
                        $emploi_title,
                        $emploi_discription,
                        $emploi_content,
                        $emploi_id,
                        $emploi_nom,
                        $emploi_prenom,
                        $emploi_phone,
                        $emploi_email,
                        $emploi_date,
                        $new_img_name));
        
                $successMsg= "Your job offer has been published on the site";
                }
            }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
        }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
    }else{
        $errorMsg= "Please complete all fields...";
    }
}