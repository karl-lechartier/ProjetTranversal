<?php
session_start();
$token=filter_input(INPUT_POST, "token");
if($token!=$_SESSION["token"]){
    die("Erreur de Token");
}

$nom = filter_input(INPUT_POST, "nom");
$id = filter_input(INPUT_POST, "id");

include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("update secteur set nom=:nom where id=:id");
$requete->bindParam(":nom", $nom);
$requete->bindParam(":id", $id);
$requete->execute();

header("location: ../adminSecteur.php");
?>