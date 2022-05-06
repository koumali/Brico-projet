<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        require('../database.php');
        $status = "Offline now";
        $sql = "UPDATE user SET status = '{$status}' WHERE unique_id = $_SESSION[unique_id]";        
        $query2 = $bdd->prepare($sql);
        $query2->execute(array());
        if($query2){
            $_SESSION = [];
            session_destroy();
            header('Location: ../../login.php');
        }
    }else{  
    header("location: ../../login.php");
}