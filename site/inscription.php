 <?php 
     require 'header.php';
?>
    <div class="formulaire">
        <h2 class="titre"> Inscription </h2>   
        <form id="formInscription" class="form-margin-top" action="confirmation_inscription.php" method="post">
            <div class="form-width">
                <input type="text" placeholder="Nom" id="nom" name="nom" class="saisie" required />
                <input type="text" placeholder="Prénom" id="prenom" name="prenom" class="saisie" required />
                <input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" class="saisie" required />
                <input type="date" placeholder="Date de naissance" id="birthdate" name="birthdate" class="saisie" required/>
                <input type="email" placeholder="E-mail" id="email" name="email"  class="saisie" required />
                <input type="password" placeholder="Mot de passe" id="pwd" name="pwd" class="saisie" required/>
                <input type="password" placeholder="Confirmez votre mot de passe" id="pwdConfirm" name="pwdConfirm" class="saisie" required/>
                <input type ="tel" placeholder="Numéro de téléphone" name="tel" Pattern="^(\+33|0033|0)(6|7)[0-9]{8}"  minlength="10" maxlength="12" class="saisie" required/>
            </div>
            <label id="accept-term-container">
                <input id="accept-terms" type="checkbox" name="acceptTerms" />
                <div class="helmet-checkbox">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560.11 498.37"><defs><style>.helmet-checkbox .cls-1{fill:#e20000;}.helmet-checkbox .cls-2{fill:#939393;}</style></defs><title>full-helmet</title><g id="casque"><path class="cls-1" d="M279.5,648.5s-75-103-56-210,113-157,128-163,166-83,308,29l35,45,26,51,23,84-122,12-4,4,1,53L724,573l46,5s9.5,27.5,10.5,37.5-28,97-39,127c0,0-171-57-386-80C355.5,662.5,306.5,659.5,279.5,648.5Z" transform="translate(-220.42 -244.13)"/></g><g id="visiere"><path class="cls-2" d="M746.5,452.5l-140,8s-10,4-23-13a182.65,182.65,0,0,0-25-27s-28-19-38,20l-10,36s-9,25,21,29l19,4s18-1,25,11l14,17s10,14,22,16,146,27,156,27h4Z" transform="translate(-220.42 -244.13)"/></g></svg>
                </div>
                <span> J'ai lu et j'accepte les <a>Termes</a>, <a>Conditions</a> et <a>la politique de confidentialité</a>.</span>
            </label>
            <input type="submit" value="Inscription" class="bouton"/>
        </form>
    </div>
<?php
    require 'footer.php';
?>
