<?php
$title = 'Raminagrobis - Gestion Secteur';
include "../header.php";
?>
<div class="container">
    <a href="ajouterSecteur.php">Ajouter un secteur</a>
    <h2>Liste des secteurs</h2>
    <?php
    include_once "../config.php";
    $pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);

    $requete = $pdo->prepare("select * from secteur");
    $requete->execute();
    $lignes = $requete->fetchAll();
    ?>
    <table class="table table-striped">
        <tr>
            <th>Nom du secteur</th>
            <th></th>
        </tr>
        <?php
        foreach ($lignes as $l) {
            ?>
            <tr>
                <td><?php echo $l["nom"] ?></td>
                <td><a href="modifierSecteur.php?id=<?php echo $l["id"] ?>">Modifier</a></td>
                <td><a href="actions/deleteSecteur.php?id=<?php echo $l["id"] ?>">Supprimer</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
include "../footer.php"
?>