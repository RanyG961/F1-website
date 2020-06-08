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

    <h3> Ajouter un circuit </h3>
    <form class="ajout" action="ajout_circuit.php" method="post">
        <input class="ajoutCircuit" type="text" placeholder="Nom" id="nomC" name="nom" required />
        <input class="ajoutCircuit" type="text" placeholder="Pays" id="pays" name="pays" required />
        <input class="ajoutCircuit" type="text" placeholder="Ville" id="ville" name="ville" required />
        <input class="ajoutCircuit" type="number" step="0.0001" placeholder="Longuer(km)" id="long" name="long" required />
        <input class="ajoutCircuit" type="number" placeholder="Nb de tours" id="tours" name="tours" required />
        <input class="ajoutCircuit" type="text" placeholder="circuitID" id="circuitID" name="circuitID" required />
        <br>
        <input type="submit" value="Inscription" class="bouton"/>
    </form>

    <h1>Liste des circuits</h1>

    <table class="tab">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nom </th>
                <th> Pays </th>
                <th> Ville </th>
                <th> Longueur(km) </th>
                <th> Nb de tours </th>
                <th> circuitID </th>
                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <th>  Supprimer  </th>
            <?php endif; ?>
            </tr>
        </thead>
        <?php $circuits = json_decode(afficheCircuits(), true);
              foreach($circuits as $circuit): 
        ?>
            <tr>
                <td> <?= $circuit['id'] ?> </td>
                <td> <?= $circuit['name'] ?> </td>
                <td> <?= $circuit['country'] ?> </td>
                <td> <?= $circuit['city'] ?> </td>
                <td> <?= $circuit['length'] ?> </td>
                <td> <?= $circuit['turns'] ?> </td>
                <td> <?= $circuit['circuitID'] ?> </td>
                <?php if($_SESSION['auth']['id'] == 1): ?>
                    <td> <a class="link" href="supprime_compte.php?option=4&supprime=<?= $circuit['id'] ?>"> Supprimer </a> </td>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>