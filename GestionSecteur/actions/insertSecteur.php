<?php
$nom = filter_input(INPUT_POST, "nom");

//je vais chercher la config
include_once "../config.php";
//Faire une connexion à la base de données
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);
//Préparer la requête --> FAIRE ATTENTION avec la concaténation !
$requete = $pdo->prepare("insert into secteur(nom) values (:nom)");
$requete->bindParam(":nom", $nom);

$requete->execute();

header("location: ../index.php");
?>