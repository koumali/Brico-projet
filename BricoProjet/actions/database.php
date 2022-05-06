<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=brico;charset=utf8;','root');
    }catch(Exception $e){
        die('Une erreur a été trouver : ' . $e->getMessage());
    }
    