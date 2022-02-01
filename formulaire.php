<?php
session_start();
$token = uniqid();
$_SESSION["token"] = $token;

$t = filter_input(INPUT_GET, "t");

$title = $t;
include "header.php";
include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select formulaires.*,secteur.nom,secteur.id as 'sid' from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id where formulaires.titre=:titre");
$requete->bindParam(":titre", $t);
$requete->execute();
$lignes = $requete->fetchAll();
$formulaire = $lignes[0];
?>
<style>
    body {
        background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0)),url("<?php echo 'IMG/'.$formulaire['imgsrc']?>");
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<main>
<div class="flex-container" style="color: <?php echo $formulaire['couleur'] ?>">

    <div class="flex-child">
        <h1><?php echo $formulaire['titre'] ?></h1>
        <p><?php echo $formulaire['description'] ?></p>
        <p><?php echo $formulaire['date_evenement'] ?></p>
        <p><?php echo $formulaire['description'] ?></p>
    </div>

    <div class="flex-child">
        <form action="insertPersonne.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <input type="hidden" value="<?php echo $formulaire["id"] ?>" name="id">
            <p>
                <label for="last-name" class="required">Nom</label>
                <input type="text" id="last-name"
                       name="last-name"
                       placeholder="Bernard"
                       value=""
                       class="form-control"
                       required
                />
            </p>
            <p>
                <label for="first-name" class="required">Prénom</label>
                <input type="text" id="first-name"
                       name="first-name"
                       placeholder="Jean"
                       value=""
                       class="form-control"
                       required
                />
            </p>
            <p>
                <label for="civilite1">Homme</label>
                <input type="radio" id="contactChoice1"
                       name="civilite" value="homme" required>

                <label for="civilite2">Femme</label>
                <input type="radio" id="contactChoice2"
                       name="civilite" value="femme" required>
            </p>
            <p>
                <label for="email" class="required">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                       placeholder="jean.bernard@mail.com" required/>
            </p>
            <p>
                <label for="num" class="required">Numéro de téléphone</label>
                <input type="tel" id="num"
                       name="phone"
                       placeholder="00 00 00 00 00"
                       value=""
                       class="form-control"
                />
            </p>
            <p>
                <label for="nbr">Nombres de personne(s)</label>
                <input type="number" id="nbr" name="nbr" min="1" value="1">
            </p>
            <p>
                <input type="checkbox" id="pro" name="pro" value="true">
                <label for="pro">Êtes-vous un professionnel ?</label>
            </p>
            <p>
                <label for="company-name" class="required">Nom de l'entreprise</label>
                <input type="text" id="company-name"
                       name="company-name"
                       placeholder="Corp and Co"
                       value=""
                       class="form-control"
                />
            </p>
            <p>
                <?php
                $requete = $pdo->prepare("select * from secteur");
                $requete->execute();
                $lignes = $requete->fetchAll();
                ?>
                <label for="secteur-select">Choisissez un secteur</label>
                <select name="secteur" id="secteur-select">
                    <option value="">--Choisissez un secteur--</option>
                    <?php foreach ($lignes as $l) {?>
                    <option value="<?php echo $l['id'] ?>"><?php echo $l['nom'] ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <input type="checkbox" id="news" name="news" value="true">
                <label for="news">S'abonner à la newsletter ?</label>
            </p>
            <!--<input type="submit" value="Envoyer">-->
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>
</div>
</main>
<?php
include "footer.php"
?>