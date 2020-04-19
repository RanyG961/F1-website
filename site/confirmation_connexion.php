<?php
include "init_session.php";
include "functions_users.php";


if(verif_utilisateur())
{
    header("Location:home.php");
}
else
{
    clean_session();
    header("Location:connexion.php");
}
