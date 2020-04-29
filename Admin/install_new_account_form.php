<h1> Create an admin account </h1>
<form action="inscription_redirect.php" method="post">
    <div class="couple">
        <label for="nom"> Name: </label>
        <input type="text" id="nom" name="nom" required />
    </div>
    
    <div class="couple">
        <label for="prenom"> First name: </label>
        <input type="text" id="prenom" name="prenom" required />
    </div>

    <div class="couple">
        <label for="birthdate"> Birthdate: </label>
        <input type="date" id="birthdate" name="birthdate" required />
    </div>

    <div class="couple">
        <label for="email"> E-mail : </label>
        <input type="email" id="email" name="email" required />
    </div>

    <div class="couple">
        <label for="pwd"> Password: </label>
        <input type="password" id="pwd" name="pwd" required />
    </div>

    <div class="couple">
        <label for="pwdConfirm"> Password: </label>
        <input type="password" id="pwdConfirm" name="pwdConfirm" required />
    </div>

    <div class="couple">
        <label for="pseudo"> Nickname: </label>
        <input type="text" id="pseudo" name="pseudo" required />
    </div>

    <input type ="tel" placeholder="Numéro de téléphone" name="tel" Pattern="^(\+33|0033|0)(6|7)[0-9]{8}"  minlength="10" maxlength="12" class="saisie" required/>

    <input id="button-id" type="submit" valeur="ajouter" id="ajouter" />
</form>
