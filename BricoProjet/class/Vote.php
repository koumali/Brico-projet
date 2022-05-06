<?php

class Vote{

    private $bdd;
    private $former_vote;
    public function __construct(PDO $bdd){
        $this->bdd = $bdd;
    }
    
    private function recordExist($ref,$ref_id){
        $req= $this->bdd->prepare("SELECT * FROM $ref WHERE id =?");
        $req->execute(array($ref_id));
        if ($req->rowCount()== 0){
            throw new Exception("impossible de voter pour un enregistrement qui n existe pas!");
        }
    }
    public function like($ref,$ref_id,$user_id){
        if($this->vote($ref,$ref_id,$user_id,1)){
            if ($this->former_vote){
                $sql_part =", count_dislike = count_dislike -1";
            }
            $this->bdd->query("UPDATE $ref SET like_count =like_count + 1 $sql_part WHERE id =$ref_id");
            return true;
        }
        return false;
    }
    public function dislike($ref,$ref_id,$user_id){ 
        if($this->vote($ref,$ref_id,$user_id,-1)){
            if ($this->former_vote){
                $sql_part =", like_count = like_count -1";
            }
            $this->bdd->query("UPDATE $ref SET count_dislike =count_dislike + 1 $sql_part WHERE id =$ref_id");
            return true;
        }
        return false;
    }
    public static function getClass($vote){
        if ($vote){
            return ($vote['vote'] == 1 ? 'is-liked': 'is-disliked');       
        }
        return null ;
    }
    private function vote($ref,$ref_id,$user_id,$vote){
        $this->recordExist($ref,$ref_id);
        $req = $this->bdd->prepare("SELECT id , vote FROM votes WHERE ref=? AND ref_id= ? AND user_id=?");
        $req->execute(array ($ref,$ref_id,$user_id));
        $vote_row = $req->fetch();
        if ($vote_row){
            if ($vote_row['vote'] == $vote){
                return false;
            }
            // former_vote permet de modifier les donnes de la base si le client est deja par exemple liker et veut disliker
            $this->former_vote = $vote_row;
            $req = $this->bdd->prepare("UPDATE votes SET vote=? , created_at =? WHERE id = {$vote_row['id']}")->execute(array($vote,date('Y-m-d- H:i:s')));
            return true;
        }
        $req = $this->bdd->prepare("INSERT INTO votes SET ref=? , ref_id= ? , user_id=? ,created_at = ? , vote=?");
        $req->execute(array ($ref,$ref_id,$user_id,date('Y-m-d- H:i:s'),$vote));
        return true;
    }
    public function updateCount ($ref,$ref_id){
        $req = $this->bdd->prepare("SELECT COUNT(id) AS count ,vote FROM votes WHERE ref =? AND ref_id =? GROUP BY vote");
        $req->execute(array($ref,$ref_id));
        $votes =  $req->fetchAll();
        $counts =['1' =>0,
                  '-1' => 0 ];
        foreach($votes as $vote){
            $counts[$vote['vote']]=$vote['count'];
        }
        $req= $this->bdd->query("UPDATE $ref SET like_count ={$counts[1]},count_dislike = {$counts[-1]} WHERE id =$ref_id");
        return true;
    }
}