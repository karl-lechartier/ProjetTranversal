<?php
$id = filter_input(INPUT_GET, "id");
include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("DELETE FROM secteur where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetchAll();
$secteur = $lignes[0];

header("location: ../adminSecteur.php");
?>