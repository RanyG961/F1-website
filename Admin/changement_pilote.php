<?php
require_once "../site/functions_users.php";

require_once "functions.php";


if($_GET['id'])
{
    update_pilote();
    header("Location: pilotes.php");
}
