<?php

require('actions/database.php');

$getAllAnswersOfEmploi = $bdd->prepare('SELECT * FROM answers WHERE id_emploi=? ORDER BY id DESC');
$getAllAnswersOfEmploi->execute(array($idOfemploi));

