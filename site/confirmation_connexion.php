<?php

include "functions_users.php";

if(verif_utilisateur())
{
    header("Location:home.php");
}
else
{
    header("Location:probleme.php");
}