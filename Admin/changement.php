<?php
require_once "../site/functions_users.php";

require_once "functions.php";


if($_GET['id'])
{
    $option = intval($_GET['option'], 10);
    if($option === 1)
    {
        if($_GET['type'])
        {
            update_admin();
            header("Location: admin_home.php");
        }
    }
    elseif($option === 2)
    {
        update_pilote();
        header("Location: pilotes.php");
    }
    elseif($option === 3)
    {
        update_equipe();
        header("Location: equipes.php");
    }
}

