<?php
$nom = filter_input(INPUT_POST, "nom");
$id = filter_input(INPUT_POST, "id");

//je vais chercher la config
include_once "../../config.php";
//Faire une connexion à la base de données
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);
//Préparer la requête --> FAIRE ATTENTION avec la concaténation !
$requete = $pdo->prepare("update secteur set nom=:nom where id=:id");
$requete->bindParam(":nom", $nom);
$requete->bindParam(":id", $id);

$requete->execute();

header("location: ../adminSecteur.php");
?>