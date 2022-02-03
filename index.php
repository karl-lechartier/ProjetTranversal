<?php
$title = 'Raminagrobis';
include "header.php";
include_once "config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("select formulaires.*,secteur.nom from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id order by date_fin ASC");
$requete->execute();
$lignes = $requete->fetchAll();

$today = date("Y-m-d");
$today_time = strtotime($today);

?>

    <main>
        <section id="home-cards">
            <div class="container">
                <div class="cards-wrapper">
                    <?php
                    foreach ($lignes as $l) {
                        if (strtotime($l['date_fin']) > strtotime(date("Y-m-d"))) {
                            ?>
                            <a  href="formulaire.php?t=<?php echo $l["titre"] ?>&id=<?php echo $l["id"] ?>">
                                <div class="card" style="width: 18rem;background-color: <?php echo $l['couleur'] ?>">
                                    <div class="center-cropped" style="background-image: url('IMG/<?php echo $l['imgsrc'] ?>');">
                                        <img class="card-img-top" src="IMG/<?php echo $l['imgsrc'] ?>" alt="image evenement">
                                    </div>
                                    <div class="c-body">
                                    <span><?php echo $l['titre'] ?></span>
                                    <p class="card-text"><?php echo $l['description'] ?></p>
                                    <p id="date"><?php echo $l['date_evenement'] ?></p>
                                    <p id="date"><?php echo $l['nom'] ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php
include "footer.php"
?>