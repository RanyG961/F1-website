<?php
require_once "../site/functions_users.php";
init_session();
require_once "functions.php";

//verif_utilisateur_admin();


if(verif_utilisateur_admin())
{
    header("Location: admin_home.php");
}
else
{
    echo "Erreur lors de la saisie de vos identifiants";
    header("Location: admin_home.php");
}