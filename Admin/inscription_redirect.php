<?php
require_once "../site/functions_users.php";


$is_error = nickname_exists() . email_exists() .  password_est_valide();

if(!$is_error)
{
    if(create_account(true))
    {
        header("Location:connexion.php");
    }
}
else
{
    header("Location:bdd_install.php");
}

