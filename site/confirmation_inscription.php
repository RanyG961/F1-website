<?php
include "functions_users.php";
init_session();

$is_error = nickname_exists() . email_exists() .  password_est_valide();

if(!$is_error)
{
    if(create_account(0))
    {
        header("Location:home.php");
    }
}
else
{
    header("Location:inscription.php?" . $is_error);
}

