<?php
require_once "../site/functions_users.php";
require_once "functions.php";

if(insererCircuit())
{
    header("Location: circuits.php");
}
else
{
    header("Location:circuits.php");
}