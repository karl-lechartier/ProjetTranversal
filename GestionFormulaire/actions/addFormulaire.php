<?php

$titre = filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");
//$img = filter_input(INPUT_POST, "img");
$image = $_FILES["img"];
$couleur = filter_input(INPUT_POST, "couleur");
$date_e = filter_input(INPUT_POST, "date_e");
$date_f = filter_input(INPUT_POST, "date_f");
$secteur = filter_input(INPUT_POST, "secteur");

$nomIMG = " ";

include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("INSERT INTO `formulaires` (id, titre, description, imgsrc, couleur, date_evenement, date_fin) VALUES (NULL, :titre, :description, :imgsrc, :couleur, :date_evenement, :date_fin)");

$requete->bindParam(":titre", $titre);
$requete->bindParam(":description", $description);
$requete->bindParam(":imgsrc", $nomIMG);
$requete->bindParam(":couleur", $couleur);
$requete->bindParam(":date_evenement", $date_e);
$requete->bindParam(":date_fin", $date_f);
$requete->execute();

$id = $pdo->lastInsertId();

$nomIMG = $id."-".basename($image["name"]);
move_uploaded_file($image["tmp_name"], "../../IMG/$nomIMG");

$requete = $pdo->prepare("INSERT INTO `secteursparformulaires` (id_formulaires, id_secteurs) VALUES (:id_formulaires, :id_secteurs)");
$requete->bindParam(":id_formulaires", $id);
$requete->bindParam(":id_secteurs", $secteur);
$requete->execute();

$requete = $pdo->prepare("update formulaires set imgsrc=:photo where id=:id");
$requete->bindParam(":photo", $nomIMG);
$requete->bindParam(":id", $id);
$requete->execute();

echo 'oui';
header("location: ../adminFormulaire.php");
?>