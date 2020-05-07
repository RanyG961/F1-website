<?php
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";
require_once "admin_header.php";
?>

<h2>Bonjour</h2>
<?php if(is_logged() && $_SESSION['auth']['is_admin'] == 1): ?>
    <span> Bienvenue <?= $_SESSION['auth']['nickname']; ?> </span>
    <a href="logout.php"> Se déconnecter </a>
    <h1> Liste des membres </h1>

    <table>
        <?php 
            $membres = affiche_membres();
            foreach ($membres as $membre): 
        ?>
        <tr>
            <th> id </th>
            <th> Prénom </th>
            <th> Nom </th>
            <th> Date de naissance </th>
            <th> Mot de passe </th>
            <th> Pseudo </th>
            <th> Email </th>
            <th> Admin </th>
            
            <?php if($_SESSION['auth']['id'] == 1): ?>
                <th> Supprimer </th>
            <?php endif; ?>
        </tr>
        <tr>
            <td> <?= $membre['id'] ?> </td>
            <td> <?= $membre['first_name'] ?> </td>
            <td> <?= $membre['last_name'] ?> </td>
            <td> <?= $membre['birthdate'] ?> </td>
            <td> <?= $membre['password'] ?> </td>
            <td> <?= $membre['nickname'] ?> </td>
            <td> <?= $membre['mail'] ?> </td>
            <td> <?= $membre['is_admin'] ?>
                 <?php if($membre['is_admin'] == 0 && $_SESSION['auth']['id'] != 1): ?>
                        <br/>
                        <a href="changement_admin.php?type=admin&confirme=<?= $membre['id'] ?>"> Le passer en admin </a>
                 <?php elseif($_SESSION['auth']['id'] == 1 && $membre['is_admin'] == 0): ?>
                        <br/>
                        <a href="changement_admin.php?type=superadmin&value=0&confirme=<?= $membre['id'] ?>"> Le passer en admin </a>
                <?php elseif($_SESSION['auth']['id'] == 1 && $membre['is_admin'] == 1): ?>
                        <br/>
                        <a href="changement_admin.php?type=superadmin&value=1&confirme=<?= $membre['id'] ?>"> Le passer en utilisateur </a>
                 <?php endif; ?>
            </td>

            <?php if($_SESSION['auth']['id'] == 1): ?>
                <td> <a href="supprime_compte.php?supprime=<?= $membre['id'] ?>"> Supprimer </a> </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?> 
    </table>
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
