<?php
    require_once "../site/functions_users.php";
    init_session();
  
    require_once "admin_header.php";
?>

    <div class="formulaire">
        <h2 class="titre"> Connexion </h2>
        <form id="formConnexion" action="connexion_redirect.php" method="POST">
            <div class="">
                <input type="text" placeholder="Identifiant" id="identifiant" name="identifiant"  required />
                <input type="password" id="pwd" name="pwd" placeholder="Mot de passe"  required />
                <input type="submit" value="Connexion" class="bouton"/>
            </div>
        </form>
    </div>
<?php
    require 'admin_footer.php';
?>