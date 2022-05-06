<?php
session_start();
require('actions/database.php');

if (isset($_GET['section'])){
    $section=htmlspecialchars($_GET['section']);
}else{
    $section="";
}

if (isset($_POST['validate'],$_POST['Email'])){
    // verfie si l'user a bien complete tous les champs
    if (!empty($_POST['Email'])){
        // les donnes de l'user
        $user_email = htmlspecialchars($_POST['Email']);
        if (filter_var($user_email,FILTER_VALIDATE_EMAIL)){
            // verifier est ce que l'user existe(l'email existe)
            $checkIfEmailExiste =$bdd->prepare('SELECT id,email FROM user WHERE email=?');
            $checkIfEmailExiste->execute(array($user_email));
            
            if ($checkIfEmailExiste->rowCount() > 0){
                // recuperer les donnes de l'utilisateur 
                $userInfos = $checkIfEmailExiste->fetch();
                $pseudo=$userInfos['email'];
                $_SESSION ['recup_mail']=$user_email;
                $recup_code="";
                for($i=0;$i<8;$i++){
                    $recup_code.=mt_rand(1,9);
                }
                $_SESSION ['recup_code']=$recup_code;
                $mail_recup_exist=$bdd->prepare('SELECT id FROM recuperation WHERE mail=?');
                $mail_recup_exist->execute(array($user_email));
                if ($mail_recup_exist->rowCount()>0){
                    $recup_update =$bdd->prepare('UPDATE recuperation SET code=? WHERE mail=?');
                    $recup_update->execute(array($recup_code,$user_email));
                }else{
                    $recup_insert =$bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?,?)');
                    $recup_insert->execute(array($user_email,$recup_code));
                }
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"[VOUS]"<votremail@gmail.com>'."\n";
                $header.='Content-Type:text/html; charset="utf-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $message = '
                <html>
                <head>
                    <title>Récupération de mot de passe - Votresite</title>
                    <meta charset="utf-8" />
                </head>
                <body>
                    <font color="#303030";>
                    <div align="center">
                        <table width="600px">
                        <tr>
                            <td>
                                
                                <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
                                Voici votre code de récupération: <b>'.$recup_code.'</b>
                                A bientôt sur <a href="#">Votre site</a> !
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <font size="2">
                                Ceci est un email automatique, merci de ne pas y répondre
                                </font>
                            </td>
                        </tr>
                        </table>
                    </div>
                    </font>
                </body>
                </html>
                ';
                mail($user_email, "Récupération de mot de passe - Votresite", $message, $header);
                header('Location: http://localhost/test3/mdpoublier.php?section=code');                
            }else{
                $errorMsg = "The Email entered is not correct...";
            }

        }else{
            $errorMsg = "Invalid Email address...";
        }

    }else{
        $errorMsg = "Please enter your email address...";
    }
}
if (isset($_POST['verif-cade'],$_POST['verif-submit'])){
    if (!empty($_POST['verif-cade'])){
        $verif_cade =htmlspecialchars($_POST['verif-cade']);
        $verif_req =$bdd->prepare('SELECT id FROM recuperation WHERE mail=? AND code=?');
        $verif_req->execute(array($_SESSION ['recup_mail'],$_SESSION ['recup_code']));
        $verif_req=$verif_req->rowCount();
        if ($verif_req == 1){
            $del_req=$bdd->prepare('DELETE FROM recuperation WHERE mail =?');
            $del_req->execute(array($_SESSION ['recup_mail']));
            header('Location:  http://localhost/test3/mdpoublier.php?section=changemdb');
        }else{
            $errorMsg ="Invalid code...";
        }
    }else{
        $errorMsg ="Please enter your confirmation code!";
    }
}
if (isset($_POST['change_submit'])){
    if (isset($_POST['change_mdbc'],$_POST['change_mdb'])){
        $mdbc =htmlspecialchars($_POST['change_mdbc']);
        $mdb=htmlspecialchars($_POST['change_mdb']);
        if (!empty($mdbc) AND !empty($mdb)){
            if ($mdb==$mdbc){
                $mdb=password_hash($mdb,PASSWORD_DEFAULT);
                $update_mdb=$bdd->prepare('UPDATE users SET mdp=? WHERE email=?');
                $update_mdb->execute(array($mdb,$_SESSION ['recup_mail']));
                header('Location: login.php');
            }else{
                $errorMsg="Your passwords do not match!";
            }
        }else{
            $errorMsg="Please complete all fields...!";
        }
    }else{
        $errorMsg="Please complete all fields...!";
    }
}
?>
