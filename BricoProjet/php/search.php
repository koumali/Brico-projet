<?php
    session_start();
    require('../actions/database.php');
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = $_POST['searchTerm'];

    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} AND (nome LIKE '%{$searchTerm}%' OR prenom LIKE '%{$searchTerm}%') ";
    $output = "";
    $query= $bdd->prepare($sql);
    $query->execute(array());
    if($query->rowCount() > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>