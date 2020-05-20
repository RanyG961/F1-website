<?php
require_once "functions_users.php";

init_session();

if(modifierProfil())
{
    echo "J'ai réussi";
}
else
{
    echo "T'es nul";
}