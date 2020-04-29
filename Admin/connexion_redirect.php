<?php
require_once "../site/functions_users.php";
require_once "functions.php";

//verif_utilisateur_admin();


if(verif_utilisateur_admin())
{
    header("Location: admin_home.php");
}
else
{
    header("Location: connexion.php");
}