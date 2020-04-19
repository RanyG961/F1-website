<?php
  require 'header.php';
?>

    <div class="formulaire">
        <h2 class="titre"> Connexion </h2>
        <form id="formConnexion" class="form-margin-top" action="confirmation_connexion.php" method="POST">
            <div class="form-width">
                <input type="text" placeholder="Identifiant" id="identifiant" name="identifiant" class="saisie" required />
                <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="saisie" required />
                <input type="submit" value="Connexion" class="bouton"/>
            </div>
        </form>
    </div>
<?php
    require 'footer.php';
?>
