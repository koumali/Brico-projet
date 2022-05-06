

<?php
session_start();
require("actions/database.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    http_response_code(403);
    die();
}

$acepted_refs=['emplois'];
if (!in_array($_POST['ref'],$acepted_refs)){
    http_response_code(403);
    die();
}
if (!isset($_SESSION['id'])){
    header('Location: login.php');
}

require('class/Vote.php');
$vote = new Vote($bdd);

if ($_POST['vote'] == 1){
    $vote->like($_POST['ref'],$_POST['ref_id'],$_SESSION['id']);
}else{
    $vote->dislike($_POST['ref'],$_POST['ref_id'],$_SESSION['id']);
}
$req = $bdd->prepare("SELECT like_count,count_dislike FROM {$_POST['ref']} WHERE id =?");
$req->execute(array($_POST['ref_id']));

header('Content-type: application/json');
die(json_encode($req->fetch(PDO::FETCH_ASSOC)));