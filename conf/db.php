<?php

function connexionBdd(){
    $hote = "localhost";
    $db = "mate_maker_api";
    $user = "root";
    $pass = "";
    try {
        $bdd = new PDO('mysql:host='.$hote.';dbname='.$db.';charset=utf8', $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (Exception $e) {
        die('<b>Erreur de connexion à la Bdd :</b> <br>' . $e->getMessage());
    }
}
?>