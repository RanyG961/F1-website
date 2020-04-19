<?php
include "functions_users.php";
init_session();

$_SESSION["from_ci"] = true;

if(nickname_exists() && email_exists() &&  password_est_valide())
{
    if(create_account())
    {
        header("Location:home.php");
    }
}
else
{
    header("Location:inscription.php");
}

