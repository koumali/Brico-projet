<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        require('../actions/database.php');
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')" or die();
            $query= $bdd->prepare($sql);
            $query->execute(array());
    }
    }else{
        header("location: ../login.php");
    }
  
?>