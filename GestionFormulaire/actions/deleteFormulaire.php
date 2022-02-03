<?php
$id = filter_input(INPUT_GET, "id");
include_once "../../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);


$r = $pdo->prepare("select imgsrc from formulaires where id = :id");
$r->bindParam(":id", $id);
$r->execute();
$l = $r->fetchAll();
$formulaire = $l[0];
echo $formulaire['imgsrc'];
unlink('../../IMG/'.$formulaire['imgsrc']);

$requete = $pdo->prepare("DELETE FROM formulaires where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

header("location: ../adminFormulaire.php");
?>