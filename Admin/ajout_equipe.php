<?php
require_once "../site/functions_users.php";
require_once "functions.php";

if(insererEquipe())
{
    header("Location: equipes.php");
}
else
{
    header("Location: equipes.php");
}