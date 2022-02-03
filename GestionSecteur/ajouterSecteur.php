<?php
session_start();
$token = uniqid();
$_SESSION["token"] = $token;

$title = 'Raminagrobis - Ajouter Secteur';
include "../header.php";
?>
<main>
    <div class="container">
        <form action="actions/insertSecteur.php" method="post">
            <h1>Ajouter un secteur</h1>
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <p>
                <label for="titre">Nom du secteur</label>
                <input type="text" name="nom" required class="form-control">
            </p>
            <input type="submit" value="OK" class="btn">
        </form>
    </div>
</main>
<?php
include "../footer.php"
?>
