<?php
require_once "functions_users.php";
init_session();

if(!pronosticExist())
{
    if(insert_pronostic())
    {
        echo "Votre pronostic a été bien pris en compte";
    }
    else
    {
        echo "Problème lors de la saisie de votre pronostic";
    }
}
else
{
    echo "t as déjà pronostiqué frérot";
}