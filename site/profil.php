<?php require_once "header.php"; ?>

<div id="test">
    <h1> Profil de <?= $_SESSION['auth']['nickname']; ?> ! </h1>


    <form id="editerProfil" action="modifier_profil.php" method="post">
                <input type="text" placeholder="Nom : <?= $_SESSION['auth']['last_name']?>" id="nom" name="nom" class="saisie" />
                <input type="text" placeholder="Prénom : <?= $_SESSION['auth']['first_name']?>"" id="prenom" name="prenom" class="saisie" />
                <input type="text" placeholder="Pseudo : <?= $_SESSION['auth']['nickname']?>"" id="pseudo" name="pseudo" class="saisie"/>
                <input type="email" placeholder="E-mail : <?= $_SESSION['auth']['mail']?>"" id="email" name="email" class="saisie"/>
                <input type="password" placeholder="Mot de passe" id="pwd" name="pwd" class="saisie">
                <input type="password" placeholder="Confirmez votre mot de passe" id="pwdConfirm" name="pwdConfirm" class="saisie" />
                <input type="submit" value="Mettre à jour mon profil" class="bouton"/>
    </form> 
</div>
