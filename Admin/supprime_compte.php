<?php
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";

if ($_GET['supprime']) 
{
    $option = intval($_GET['option'], 10);
    if($option === 1)
    {
        supprime_compte();
        header("Location: admin_home.php");
    }
    elseif($option === 2)
    {
        supprime_pilote();
        header("Location: pilotes.php");
    }
    elseif($option === 3)
    {
        supprime_equipe();
        header("Location: equipes.php");
    }
    elseif($option === 4)
    {
        supprime_circuit();
        header("Location: circuits.php");
    }
}

