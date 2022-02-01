<?php
session_start();
$token=filter_input(INPUT_POST, "token");
if($token!=$_SESSION["token"]){
    die("Erreur de Token");
}

$formulaire = filter_input(INPUT_POST, "id");
$nom = filter_input(INPUT_POST, "last-name");
$prenom = filter_input(INPUT_POST, "first-name");
$civilite = filter_input(INPUT_POST, "civilite");
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");
$nbr = filter_input(INPUT_POST, "nbr");
$pro = filter_input(INPUT_POST, "pro");
$nomCo = filter_input(INPUT_POST, "company-name");
$news = filter_input(INPUT_POST, "news");
$secteur = filter_input(INPUT_POST, "secteur");

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
$query = $pdo->prepare("insert into personnes(id, nom, prenom, civilite, email, numportable, nbr_personne, newsletter, pro, nom_entreprise, id_formulaire, id_secteur) VALUES (NULL, :nom, :prenom, :civilite, :email, :phone, :nbr, :news, :pro, :nomCo, :formulaire, :secteur)");

$query->bindParam(":nom", $nom);
$query->bindParam(":prenom", $prenom);
$query->bindParam(":civilite", $civilite);
$query->bindParam(":email", $email);
$query->bindParam(":phone", $phone);
$query->bindParam(":nbr", $nbr);
$query->bindParam(":news", $news);
$query->bindParam(":pro", $pro);
$query->bindParam(":nomCo", $nomCo);
$query->bindParam(":formulaire", $formulaire);
$query->bindParam(":secteur", $secteur);
$query->execute();

header("location: merci.php");