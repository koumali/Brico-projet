<?php

require('actions/database.php');

$getAllMyEmplois = $bdd->prepare('SELECT id, titre, description, date_publication, image FROM emplois WHERE id_auteur =? ORDER BY id DESC');
$getAllMyEmplois->execute(array($_SESSION['id']));
