<?php
$title = 'Raminagrobis - Modifer Formulaire';
include "../header.php";
//TODO il faut gérer un token de sécurité

//Récupérer l'ID dans l'URL
$id = filter_input(INPUT_GET, "id");
//je vais chercher la config
include_once "../config.php";
//Faire une connexion à la base de données
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO,
    Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("select formulaires.*,secteur.nom from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id where formulaires.id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetchAll();
$formulaire = $lignes[0]; //normalement je n'ai récupéré qu'une ligne
?>
    <div class="container">
        <h1>Modifier le formulaire</h1>
        <form action="actions/updateFormulaire.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $formulaire["id"] ?>" name="id">
            <p>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $formulaire["titre"] ?>">
            </p>

            <p>
                <label for="description" class="required">Description</label>
                <textarea name="description" id="description" rows="5" cols="40" class="form-control"><?php echo $formulaire["description"] ?></textarea>
            </p>

            <p>
                <label for="img">Image</label>
                <input type="file" id="img" name="img" enctype="multipart/form-data">
            </p>

            <p>
                <label for="couleur">Couleur</label>
                <input type="color" name="couleur" id="couleur" class="form-control" value="<?php echo $formulaire["couleur"] ?>">
            </p>

            <p>
                <label for="date_e">Date de l'évènement</label>
                <input type="date" id="date_e" name="date_e" value="<?php echo $formulaire["date_evenement"] ?>" min="2018-01-01" max="2100-12-31">
            </p>

            <p>
                <label for="date_f">Date de fin d'inscription</label>
                <input type="date" id="date_f" name="date_f" value="<?php echo $formulaire["date_fin"] ?>" min="2018-01-01" max="2100-12-31">
            </p>


            <input type="submit" value="OK" class="">
        </form>
    </div>

<?php
include "../footer.php"
?>