<?php
require_once "../site/functions_users.php";

//print_r($_POST);
// $is_error = nickname_exists() . email_exists() .  password_est_valide();

if(!$is_error)
{
    if(create_account(true))
    {
        header("Location:admin_home.php");
    }
}
else
{
    header("Location:bdd_install.php");
}

//create_account(true);
