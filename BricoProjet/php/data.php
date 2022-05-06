<?php
    while($row = $query->fetch()){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = $bdd->prepare($sql2);
        $query2->execute(array());
        $row2 = $query2->fetch();
        if($query2->rowCount() > 0){
            $result = $row2['msg'];
        }else{
            $result ="No message available";}
        if(strlen($result) > 28){
            $msg =  substr($result, 0, 28) . '...';
        }else{
            $msg = $result;}
        if(isset($row2['outgoing_msg_id'])){
            if($outgoing_id == $row2['outgoing_msg_id']){
                $you = "You: ";
            }else{$you = "";}
        }else{
            $you = "";
        }
        if($row['status'] == "Active now"){
          $offline = "";
        }else{
            $offline = "offline";
        }
        if($outgoing_id == $row['unique_id']){
            $hid_me = "hide";
        }else{
            $hid_me = "";
        }
        $output .= '<a href="chat.php?id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="img/'. $row['image'] .'">
                    <div class="details">
                        <span>'. $row['nome']. " " . $row['prenom'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>