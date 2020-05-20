<?php
require_once "functions_users.php";

init_session();

if(modifierProfil())
{
    header("Location: profil.php");
}
else
{
    header("Location: probleme.php");
}