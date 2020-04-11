<h1> Create an admin account </h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="couple">
        <label for="lastName"> Name: </label>
        <input type="text" id="lastName" name="lastName" required />
    </div>
    
    <div class="couple">
        <label for="firstName"> First name: </label>
        <input type="text" id="firstName" name="firstName" required />
    </div>

    <div class="couple">
        <label for="birthdate"> Birthdate: </label>
        <input type="date" id="birthdate" name="birthdate" required />
    </div>

    <div class="couple">
        <label for="mail"> E-mail : </label>
        <input type="email" id="mail" name="mail" required />
    </div>

    <div class="couple">
        <label for="pwd"> Password: </label>
        <input type="password" id="pwd" name="pwd" required />
    </div>

    <div class="couple">
        <label for="nickname"> Nickname: </label>
        <input type="text" id="nickname" name="nickname" required />
    </div>

    <input id="button-id" type="submit" valeur="ajouter" id="ajouter" />
</form>
