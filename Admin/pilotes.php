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

    <h3> Ajouter un pilote</h3>
    <form class="ajout" action="ajout_pilote.php" method="post">
            <input class="ajoutPilote" type="text" placeholder="Nom" id="nomP" name="nom" required />
            <input class="ajoutPilote" type="text" placeholder="Prénom" id="prenom" name="prenom" required />
            <input class="ajoutPilote" type="text" placeholder="Code (3 premières lettres)" id="code" name="code" required />
            <input class="ajoutPilote" type="number" placeholder="Numéro" id="numero" name="numero" required />
            <select class="ajoutPilote" name="equipe">
                    <?php $equipes = afficheEquipes(); 
                          foreach($equipes as $equipe): 
                    ?>
                        <option> <?= $equipe['name'] ?> </option>
                    <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" value="Inscription" class="bouton"/>
    </form>
    <h1> Liste des pilotes </h1>

    <table class="tab"> 
        <thead>
            <tr>
                <th> ID </th>
                <th> Prénom </th>
                <th> Nom </th>
                <th> Code </th>
                <th> Numéro </th>
                <th> Constructeur </th>
                <th> Conduit </th>
                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <th> Supprimer </th>
                <?php endif; ?>
            </tr>
        </thead>
        <?php 
            $pilotes = affichePilotes_admin();;
            foreach($pilotes as $pilote):
        ?>
        <tr>
            <td> <?= $pilote['id'] ?> </td>
            <td> <?= $pilote['first_name'] ?> </td>
            <td> <?= $pilote['last_name'] ?> </td>
            <td> <?= $pilote['code'] ?> </td>
            <td> <?= $pilote['numero'] ?> </td>
            <td> <?= $pilote['constructeur'] ?> </td>
            <td> <?= $pilote['still_driving'] ?> 
                <br/>
                <?php if($pilote['still_driving'] == 1): ?>
                    <a class="link" href="changement.php?option=2&id=<?= $pilote['id'] ?>&value=1"> Ne conduit plus </a>
                <?php elseif($pilote['still_driving'] == 0): ?>
                    <a class="link" href="changement.php?option=2&id=<?= $pilote['id'] ?>&value=0"> Reconduit </a>
                <?php endif; ?>
            </td>
            <?php if($_SESSION['auth']['id'] == 1): ?>
                    <td> <a class="link" href="supprime_compte.php?option=2&supprime=<?= $pilote['id'] ?>"> Supprimer </a> </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
    
<?php endif; ?>