<?php
session_start();
$token = uniqid();
$_SESSION["token"] = $token;

$title = 'Raminagrobis - Modifer Secteur';
include "../header.php";

$id = filter_input(INPUT_GET, "id");
include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("select * from secteur where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetchAll();
$secteur = $lignes[0];
?>
    <div class="container">
        <h1>Modifier un secteur</h1>
        <form action="actions/updateSecteur.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <input type="hidden" value="<?php echo $secteur["id"] ?>" name="id">
            <div class="">
                <label for="titre">Nom du secteur</label>
                <input type="text" name="nom" id="nom" class="" value="<?php echo $secteur["nom"] ?>">
            </div>
            <input type="submit" value="OK" class="">
        </form>
    </div>

<?php
include "../footer.php"
?>