<?php
session_start();
$token=filter_input(INPUT_POST, "token");
if($token!=$_SESSION["token"]){
    die("Erreur de Token");
}

$id = filter_input(INPUT_POST, "id");
$titre = filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");
$image = $_FILES["img"];
$couleur = filter_input(INPUT_POST, "couleur");
$date_e = filter_input(INPUT_POST, "date_e");
$date_f = filter_input(INPUT_POST, "date_f");

$nomIMG = "";
$nomIMG = $id."-".basename($image["name"]);

include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);

if ($nomIMG == $id."-") {
$requete = $pdo->prepare("UPDATE formulaires SET titre = :titre, description = :description, couleur = :couleur, date_evenement = :date_e, date_fin = :date_f WHERE formulaires.id = :id");
$requete->bindParam(":titre", $titre);
$requete->bindParam(":description", $description);
$requete->bindParam(":couleur", $couleur);
$requete->bindParam(":date_e", $date_e);
$requete->bindParam(":date_f", $date_f);
$requete->bindParam(":id", $id);
$requete->execute();
} else {
    $r = $pdo->prepare("select * from formulaires where id = :id");
    $r->bindParam(":id", $id);
    $r->execute();
    $l = $r->fetchAll();
    $formulaire = $l[0];
    echo $formulaire['imgsrc'];
    unlink('../../IMG/'.$formulaire['imgsrc']);

    move_uploaded_file($image["tmp_name"], "../../IMG/$nomIMG");

    $requete = $pdo->prepare("UPDATE formulaires SET titre = :titre, description = :description, imgsrc=:imgsrc,couleur = :couleur, date_evenement = :date_e, date_fin = :date_f WHERE formulaires.id = :id");
    $requete->bindParam(":titre", $titre);
    $requete->bindParam(":description", $description);
    $requete->bindParam(":imgsrc", $nomIMG);
    $requete->bindParam(":couleur", $couleur);
    $requete->bindParam(":date_e", $date_e);
    $requete->bindParam(":date_f", $date_f);
    $requete->bindParam(":id", $id);
    $requete->execute();
}

header("location: ../adminFormulaire.php");
?>