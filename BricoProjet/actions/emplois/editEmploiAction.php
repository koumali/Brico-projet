<?php
require('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        if(isset($_FILES['image'])){
            $new_emploi_title = htmlspecialchars($_POST['title']);
            $new_emploi_discription = nl2br(htmlspecialchars($_POST['description']));
            $new_emploi_content = nl2br(htmlspecialchars($_POST['content']));


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
                                $editEmploiOnWebsite = $bdd->prepare('UPDATE emplois SET titre = ?, description=?, content= ?, image=? WHERE id= ?');
                                $editEmploiOnWebsite->execute(array($new_emploi_title, $new_emploi_discription, $new_emploi_content, $new_img_name, $idOfEmploi));
                                header('Location: mes-offres.php');
                    }
                }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
            }else{$errorMsg= "Please upload an image file - jpeg, png, jpg"; }
        }else{$errorMsg= "Please upload an image file"; }
    }else{$errorMsg= "vouillez remplire tous les champs...";}
} 