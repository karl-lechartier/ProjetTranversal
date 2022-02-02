<?php
$title = 'Raminagrobis - Gestion Formulaires';
include "../header.php";
?>

<div class="container">
    <a href="ajouterFormulaire.php">Ajouter un formulaire</a>
    <h2>Liste des formulaires</h2>
    <?php
    include_once "../config.php";
    $pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
    $requete = $pdo->prepare("select formulaires.*,secteur.nom from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id");
    $requete->execute();
    $lignes = $requete->fetchAll();
    ?>

    <table class="table table-striped">
        <?php
        foreach ($lignes as $l) {
            ?>
            <tr>
                <td><?php echo $l["titre"] ?></td>
                <td><?php echo $l["description"] ?></td>
                <td style="background-color: <?php echo $l["couleur"] ?>">Couleur</td>
                <td><img src="../IMG/<?php echo $l["imgsrc"]?>" alt="" height="125" width="auto"></td>
                <td><?php echo $l["date_evenement"] ?></td>
                <td><?php echo $l["date_fin"] ?></td>
                <td><?php echo $l["nom"] ?></td>
                <td><a href="modifierFormulaire.php?id=<?php echo $l["id"]?>">Modifier</a></td>
                <td><a href="actions/deleteFormulaire.php?id=<?php echo $l["id"]?>">Supprimer</a></td>
                <td><a href="inscritFormulaire.php?id=<?php echo $l["id"]?>">Voir les inscrits</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
include "../footer.php"
?>