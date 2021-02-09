<?php
require_once "functions_users.php";
init_session();

if(!pronosticExist())
{
    if(insert_pronostic())
    {
        
        if(position())
        {
            echo "Votre pronostic a été bien pris en compte";
        }
        else
        {
            echo "Votre pronostic n'a pas été bien pris en compte";
        }
    }
    else
    {
        echo "Votre pronostic n'a pas été bien pris en compte";
    }
}
else
{
    echo "Vous avez déjà pronostiqué";
}