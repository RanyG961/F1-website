<?php

include "functions_users.php";


if(verif_utilisateur())
{
    header("Location:homeConnect.php");
}
else
{
    header("Location:probleme.php");
}
