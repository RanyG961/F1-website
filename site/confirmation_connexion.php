<?php
include "functions_users.php";
init_session();

if(verif_utilisateur())
{
    header("Location:home.php");
}
else
{
    header("Location:probleme.php");
}