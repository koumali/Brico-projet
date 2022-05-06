<?php
require('actions/database.php');

$getAllEmploi = $bdd->query('SELECT * FROM emplois ORDER BY id DESC LIMIT 0,6');

if(isset($_GET['search']) AND !empty($_GET['search'])){
    $usersSearch = $_GET['search'];
    $getAllEmploi= $bdd->query('SELECT * FROM emplois WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
}

