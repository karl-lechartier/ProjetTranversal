<?php
$id = filter_input(INPUT_GET, "id");
include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("DELETE FROM formulaires where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

header("location: ../adminFormulaire.php");
?>