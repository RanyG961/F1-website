<?php
require_once "../site/functions_users.php";
init_session();
require_once "functions.php";

require_once "admin_header.php";
?>

<h2>Bonjour</h2>
<?php if(is_logged()): ?>
    <span> Bienvenue <?= $_SESSION['auth']['nickname']; ?> </span>
    <a href="logout.php"> Se déconnecter </a>
    <h1> Liste des membres </h1>
    <ul>
        <?php 
            $membres = affiche_membres();
            foreach ($membres as $membre): 
        ?>
            <li> <?= $membre['first_name'] ?> <?= $membre['last_name'] ?> - <?= $membre['birthdate'] ?> - <?= $membre['password'] ?> - <?= $membre['nickname'] ?> - <?= $membre['mail'] ?> - <?= $membre['is_admin'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
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
<?php endif; ?>



<?php
require_once "admin_footer.php";
?>
