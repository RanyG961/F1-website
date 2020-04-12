 <?php 
     require 'header.php';
?>
    <div class="formulaire">
        <h2 class="titre"> Inscription </h2>   
        <form id="formInscription" action="$_SERVER['PHP_SELF']" method="post">
            <input type="text" placeholder="Nom" id="nom" name="nom" class="saisie" required />
            <input type="text" placeholder="Prénom" id="prenom" name="prenom" class="saisie" required />
            <input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" class="saisie" required />
            <input type="email" placeholder="E-mail" id="email" name="email"  class="saisie" required />
            <input type="password" placeholder="Mot de passe" id="pwd" name="pwd" class="saisie" required/>
            <input type ="tel" placeholder="Numéro de téléphone" name="tel" Pattern="^9[0-9]{7}"  minlength="10" maxlength="10" class="saisie" required/>
            <input id="acceptTerms" type="checkbox" name="acceptTerms" /><label for="acceptTerms"> J'ai lu et j'accepte les <a>Termes</a>, <a>Conditions</a> et <a>la politique de confidentialité</a>. 
            </label>
            <input type="submit" value="Inscription" class="bouton"/>
        </form>
    </div>
<?php
    require 'footer.php';
?>