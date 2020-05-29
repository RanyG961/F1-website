<?php 
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";
require_once "admin_header.php";
?>

<?php if(is_logged() && $_SESSION['auth']['is_admin'] == 1): ?>

    <a class="link" id="deconnexion" href="logout.php"> Se déconnecter </a>
    <br>
    <h1> Bienvenue <a id="nom" href="admin_home.php"> <?= $_SESSION['auth']['first_name']; ?></a>!</h1>

    <h3> Ajouter une équipe </h3>
    <form class="ajout" action="ajout_equipe.php" method="post">
            <input type="text" placeholder="Équipe" id="equipe" name="equipe" required />
            <input type="text" placeholder="Moteur" id="moteur" name="moteur" required />
            <input type="text" placeholder="Monoplace" id="monoplace" name="monoplace" required />
            <input type="text" placeholder="Code" id="code" name="code" required />
            
            <br>
            <input type="submit" value="Inscription" class="bouton"/>
    </form>
    <h1> Liste des équipes</h1>

    <table class="tab">
        <thead>
            <tr>
                <th> ID </th>
                <th> Équipe </th>
                <th> Moteur </th>
                <th> Monoplace </th>
                <th> Code </th>
                <th> Racing </th>
                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <th> Supprimer </th>
                <?php endif; ?>
            </tr>
        </thead>
        <?php $equipes = afficheEquipes();
              foreach($equipes as $equipe):
        ?>
            <tr>
                <td> <?= $equipe['id'] ?> </td>
                <td> <?= $equipe['name'] ?> </td>
                <td> <?= $equipe['engine'] ?> </td>
                <td> <?= $equipe['car_name'] ?> </td>
                <td> <?= $equipe['code'] ?> </td>
                <td> <?= $equipe['still_racing'] ?> 
                    <br>
                    <?php if($equipe['still_racing'] == 1): ?>
                        <a class="link" href="changement.php?id=<?= $equipe['id'] ?>&value=1&option=3"> Ne cours plus </a>
                    <?php elseif($equipe['still_racing'] == 0): ?>
                        <a class="link" href="changement.php?id=<?= $equipe['id'] ?>&value=0&option=3"> Recours </a>
                    <?php endif; ?>
                </td>
                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <td> <a class="link" href="supprime_compte.php?option=3&supprime=<?= $equipe['id'] ?>"> Supprimer </a> </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>