<?php
$title = 'Raminagrobis - Gestion Formulaires';
include "../header.php";
?>
    <main>
        <div class="container">
            <a class="btn btn-big" href="ajouterFormulaire.php">Ajouter un formulaire</a>
            <h2>Liste des formulaires</h2>
            <?php
            include_once "../config.php";
            $pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
            $requete = $pdo->prepare("select formulaires.*,secteur.nom from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id");
            $requete->execute();
            $lignes = $requete->fetchAll();
            ?>
            <figure>
                <table>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Couleur</th>
                        <th>Image</th>
                        <th>Date de l'évènement</th>
                        <th>Date de fin</th>
                        <th>Secteur</th>
                    </tr>
                    <?php
                    foreach ($lignes as $l) {
                        ?>
                        <tr>
                            <td><?php echo $l["titre"] ?></td>
                            <td><?php echo $l["description"] ?></td>
                            <td style="background-color: <?php echo $l["couleur"] ?>"></td>
                            <td><img src="../IMG/<?php echo $l["imgsrc"] ?>" alt="" height="120" width="auto"></td>
                            <td class="center"><?php echo $l["date_evenement"] ?></td>
                            <td class="center"><?php echo $l["date_fin"] ?></td>
                            <td><?php echo $l["nom"] ?></td>
                            <td class="center nocolor"><a class="btn btn-yellow" href="modifierFormulaire.php?id=<?php echo $l["id"] ?>">Modifier</a></td>
                            <td class="center nocolor"><a class="btn btn-red" href="actions/deleteFormulaire.php?id=<?php echo $l["id"] ?>">Supprimer</a></td>
                            <td class="center nocolor"><a class="btn" href="inscritFormulaire.php?id=<?php echo $l["id"] ?>">Voir les inscrits</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </figure>
        </div>
    </main>
<?php
include "../footer.php"
?>