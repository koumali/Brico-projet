<?php
    session_start();
    require('../actions/database.php');
    $outgoing_id = $_SESSION['unique_id'];
    $query= $bdd->prepare("SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} ORDER BY id DESC");
    $query->execute(array());
    $output = "";
    if($query->rowCount() ==  0){
        $output .= "No users are available to chat";
    }elseif($query->rowCount() > 0){
        include_once "data.php";
    }
    echo $output;
?>