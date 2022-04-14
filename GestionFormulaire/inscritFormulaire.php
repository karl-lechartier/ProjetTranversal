<?php
$title = 'Raminagrobis - Modifer Formulaire';
include "../header.php";

$id = filter_input(INPUT_GET, "id");

include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select * from formulaires where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetchAll();
$formulaire = $lignes[0]
?>
<?php
$requete_personne = $pdo->prepare("select personnes.*,secteur.nom as s_nom from personnes join secteur on personnes.id_secteur = secteur.id where personnes.id_formulaire=:id");
$requete_personne->bindParam(":id", $id);
$requete_personne->execute();
$lignes = $requete_personne->fetchAll();

?>
    <main>
        <div class="container">
            <h2>Inscrits au formulaire <?php echo $formulaire["titre"] ?> :</h2>
            <figure>
                <table>
                    <tr>
                        <th>Id inscrits</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Civilité</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                        <th>Nombre de personnes</th>
                        <th>Newsletter</th>
                        <th>Professionel</th>
                        <th>Nom Entreprise</th>
                        <th>Secteur d'activité</th>
                    </tr>
                    <?php
                    foreach ($lignes as $l) {
                        ?>
                        <tr>
                            <td><?php echo $l["id"] ?></td>
                            <td><?php echo $l["nom"] ?></td>
                            <td><?php echo $l["prenom"] ?></td>
                            <td><?php echo $l["civilite"] ?></td>
                            <td><?php echo $l["email"] ?></td>
                            <td><?php echo $l["numportable"] ?></td>
                            <td><?php echo $l["nbr_personne"] ?></td>
                            <td><?php echo $l["newsletter"] ?></td>
                            <td><?php echo $l["pro"] ?></td>
                            <td><?php echo $l["nom_entreprise"] ?></td>
                            <td><?php echo $l["s_nom"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </figure>
        </div>
    </main>
<footer>
</footer>
</body>
</html>