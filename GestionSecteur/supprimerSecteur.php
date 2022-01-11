<?php
//Récupérer l'ID dans l'URL
$id = filter_input(INPUT_GET, "id");
//je vais chercher la config
include_once "config.php";
//Faire une connexion à la base de données
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);
//Préparer la requête --> FAIRE ATTENTION avec la concaténation !
$requete = $pdo->prepare("DELETE FROM secteur where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetchAll();
$secteur = $lignes[0]; //normalement je n'ai récupéré qu'une ligne

header("location: index.php");
?>