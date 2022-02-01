<?php
$title = 'Raminagrobis';
include "header.php";
//je vais chercher la config
include_once "config.php";
//Faire une connexion à la base de données
$pdo = new PDO("mysql:host=" . Config::SERVEUR . "; dbname=" . Config::BDO, Config::UTILISATEUR, Config::MOTDEPASSE);
//Préparer la requête
$requete = $pdo->prepare("select formulaires.*,secteur.nom from formulaires join secteursparformulaires on formulaires.id = secteursparformulaires.id_formulaires join secteur on secteursparformulaires.id_secteurs = secteur.id order by date_fin ASC");
//Executer la requête
$requete->execute();
//récupérer le résultat
$lignes = $requete->fetchAll();


$today = date("Y-m-d");
$today_time = strtotime($today);

?>

    <section id="home-cards">
        <div class="container">
            <div class="cards-wrapper">
                <?php
                foreach ($lignes as $l){
                    if (strtotime($l['date_fin'])>strtotime(date("Y-m-d"))){
                ?>
                <div class="card" style="background-color: <?php echo $l['couleur']?>">
                    <span><?php echo $l['titre']?></span>
                    <img width="150" src="IMG/<?php echo $l['imgsrc']?>" alt="image evenement">
                    <p><?php echo $l['description']?></p>
                    <p id="date"><?php echo $l['date_evenement']?></p>
                    <a class="btn" href="formulaire.php?t=<?php echo $l["titre"] ?>">S'inscrire</a>
                </div>
                <?php
                }}
                ?>
            </div>
        </div>
    </section>

<?php
include "footer.php"
?>