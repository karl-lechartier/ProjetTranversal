<?php
session_start();
$token = uniqid();
$_SESSION["token"] = $token;

$title = 'Raminagrobis - Ajouter Formulaire';
include "../header.php";

?>
<main>
    <div class="container">
        <form action="actions/addFormulaire.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <h1>Ajouter un formulaire</h1>
            <p>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </p>

            <p>
                <label for="description" class="required">Description</label>
                <textarea name="description" id="desciption" rows="5" cols="40" class="form-control" required></textarea>
            </p>

            <p>
                <label for="img">Image</label>
                <input type="file" id="img" name="img" enctype="multipart/form-data" required class="little-form-control">
            </p>

            <p>
                <label for="couleur">Couleur</label>
                <input type="color" name="couleur" id="couleur" required class="little-form-control form-color">
            </p>

            <p>
                <label for="date_e">Date de l'évènement</label>
                <input type="date" id="date_e" name="date_e" min="2018-01-01" max="2100-12-31" required class="little-form-control">
            </p>

            <p>
                <label for="date_f">Date de fin d'inscription</label>
                <input type="date" id="date_f" name="date_f" min="2018-01-01" max="2100-12-31" required class="little-form-control">
            </p>
            <p>
                <?php
                include_once "../config.php";
                $pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
                $requete = $pdo->prepare("select * from secteur");
                $requete->execute();
                $lignes = $requete->fetchAll();
                ?>
                <label for="secteur">Choisissez un secteur ( ne pourra pas être modifié ) </label>
                <select name="secteur" id="secteur" class="form-control">
                    <option value="">--Choisissez un secteur--</option>
                    <?php foreach ($lignes as $l) {?>
                        <option value="<?php echo $l['id'] ?>"><?php echo $l['nom'] ?></option>
                    <?php } ?>
                </select>
            </p>
            <input type="submit" value="OK" class="btn">
        </form>
    </div>
</main>
<footer>
</footer>
</body>
</html>