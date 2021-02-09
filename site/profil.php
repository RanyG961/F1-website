<?php require_once "header.php"; ?>

<div id="profil">
    <h1> Profil de <?= $_SESSION['auth']['first_name'];?> <?= $_SESSION['auth']['last_name']; ?> ! </h1>


    <form id="editerProfil" action="modifier_profil.php" method="post">
        <input type="text" placeholder="Pseudo : <?= $_SESSION['auth']['nickname']?>" id="pseudo" name="pseudo" <?php if($_GET['is_nickname']){echo "class='saisie is-error'";}else{echo "class='saisie'";}?>  />
        <input type="email" placeholder="E-mail : <?= $_SESSION['auth']['mail']?>"" id="email" name="email"  <?php if($_GET['is_email']){echo "class='saisie is-error'";}else{echo "class='saisie'";}?>   />
        <input type="password" placeholder="Mot de passe" id="pwd" name="pwd" <?php if($_GET['is_pwd']){echo "class='saisie is-error'";}else{echo "class='saisie'";}?> />
        <input type="password" placeholder="Confirmez votre mot de passe" id="pwdConfirm" name="pwdConfirm" <?php if($_GET['is_pwd_confirm']){echo "class='saisie is-error'";}else{echo "class='saisie'";}?> />
        <input type="submit" value="Mettre à jour mon profil" class="bouton"/>
    </form> 
</div>