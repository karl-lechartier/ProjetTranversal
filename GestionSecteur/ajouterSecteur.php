<?php
$title = 'Raminagrobis - Ajouter Secteur';
include "../header.php";
//TODO il faudrait gérer un token de sécurité, mais on a le temps
?>
<div class="container">
    <h1>Ajouter un secteur</h1>
    <form action="actions/insertSecteur.php" method="post">
        <div class="form-group">
            <label for="titre">Nom du secteur</label>
            <input type="text" name="nom" required class="">
        </div>
        <input type="submit" value="OK" class="">
    </form>
</div>

<?php
include "../footer.php"
?>
