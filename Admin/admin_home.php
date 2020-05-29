<?php
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";
require_once "admin_header.php";
?>

<?php if(is_logged() && $_SESSION['auth']['is_admin'] == 1): ?>

    <a class="link" id="deconnexion" href="logout.php"> Se déconnecter </a>
    <br>
    <h1> Bienvenue <?= $_SESSION['auth']['first_name']; ?> !</h1>
    <nav>
        <a class="link" href="equipes.php"> Equipes </a>
        <a class="link" href="pilotes.php"> Pilotes </a>
    </nav>
    <h2> Liste des membres </h2>

    

    <table class="tab">
        <thead>
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
        </thead>
                <?php 
            $membres = affiche_membres();
            foreach ($membres as $membre): 
        ?>
        <!-- <tbody></tbody> -->
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
                            <a class="link" href="changement.php?type=admin&option&id=<?= $membre['id'] ?>"> Le passer en admin </a>
                    <?php elseif($_SESSION['auth']['id'] == 1 && $membre['is_admin'] == 0): ?>
                            <br/>
                            <a class="link" href="changement.php?type=superadmin&value=0&option=1&id=<?= $membre['id'] ?>"> Le passer en admin </a>
                    <?php elseif($_SESSION['auth']['id'] == 1 && $membre['is_admin'] == 1): ?>
                            <br/>
                            <a class="link" href="changement.php?type=superadmin&value=1&option=1&id=<?= $membre['id'] ?>"> Le passer en utilisateur </a>
                    <?php endif; ?>
                </td>

                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <td> <a class="link" href="supprime_compte.php?option=1&supprime=<?= $membre['id'] ?>"> Supprimer </a> </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?> 
    </table>
<?php else: ?>
    <div class="formulaire">
        <h2 class="titre"> Connexion </h2>
        <form class="connexion" action="connexion_redirect.php" method="POST">
                <input type="text" placeholder="Identifiant" id="identifiant" name="identifiant"  required />
                <input type="password" id="pwd" name="pwd" placeholder="Mot de passe"  required />
                <input type="submit" value="Connexion" class="bouton"/>
        </form>
    </div>
<?php endif; ?>



<?php
require_once "admin_footer.php";
?>
