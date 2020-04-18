<?php
include "functions_users.php";
init_session();


if(nickname_exists() && email_exists() &&  password_est_valide())
{
    if(create_account())
    {
        header("Location:homeConnect.php");
    }
}
else
{
    header("Location:probleme.php");
}

