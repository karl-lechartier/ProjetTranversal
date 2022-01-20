<?php
$id = filter_input(INPUT_POST, "id");
$titre = filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");
$img = filter_input(INPUT_POST, "img");
$couleur = filter_input(INPUT_POST, "couleur");
$date_e = filter_input(INPUT_POST, "date_e");
$date_f = filter_input(INPUT_POST, "date_f");
$secteur = filter_input(INPUT_POST, "secteur");

echo $id;
echo "<br>";
echo $titre;
echo "<br>";
echo $description;
echo "<br>";
echo $img;
echo "<br>";
echo $couleur;
echo "<br>";
echo $date_e;
echo "<br>";
echo $date_f;
echo "<br>";
echo $secteur;
echo "<br>";
?>
<br>
<br>
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
