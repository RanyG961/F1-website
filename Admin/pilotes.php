<?php 
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";
require_once "admin_header.php";
?>

<?php if(is_logged() && $_SESSION['auth']['is_admin'] == 1): ?>
    <span> Bienvenue <?= $_SESSION['auth']['nickname']; ?> </span>
    <a href="logout.php"> Se déconnecter </a>
    <h1> Liste des pilotes </h1>

    <table> 
        <?php 
            $pilotes = affichePilotes_admin();;
            foreach($pilotes as $pilote):
        ?>
        <tr>
            <th> id </th>
            <th> Prénom </th>
            <th> Nom </th>
            <th> Code </th>
            <th> Numéro </th>
            <th> Constructeur </th>
            <th> Conduit </th>
        </tr>

        <tr>
            <td> <?= $pilote['id'] ?> </td>
            <td> <?= $pilote['first_name'] ?> </td>
            <td> <?= $pilote['last_name'] ?> </td>
            <td> <?= $pilote['code'] ?> </td>
            <td> <?= $pilote['numero'] ?> </td>
            <td> <?= $pilote['constructeur'] ?> </td>
            <td> <?= $pilote['still_driving'] ?> 
                <br/>
                <?php if($pilote['still_driving'] == 1) :?>
                    <a href="changement_pilote.php?id=<?= $pilote['id'] ?>&value=1"> Ne conduit plus </a>
                <?php elseif($pilote['still_driving'] == 0): ?>
                    <a href="changement_pilote.php?id=<?= $pilote['id'] ?>&value=0"> Reconduit </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form id="ajoutPilote" action="ajout_pilote.php" method="post">
            <input type="text" placeholder="Nom" id="nom" name="nom" required />
            <input type="text" placeholder="Prénom" id="prenom" name="prenom" required />
            <input type="text" placeholder="Code (à vérifier avec les données récupérées)" id="code" name="code" required />
            <input type="number" placeholder="Numéro" id="numero" name="numero" required />
            <select name="equipe">
                    <?php $equipes = afficheEquipes(); 
                          foreach($equipes as $equipe): 
                    ?>
                        <option> <?= $equipe['name'] ?> </option>
                    <?php endforeach; ?>
            </select>
            <input type="submit" value="Inscription"/>
    </form>
<?php endif; ?>