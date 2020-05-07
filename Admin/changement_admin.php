<?php
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";
//echo $_GET['type'];

if($_GET['confirme'] && $_GET['type'])
{
    update_admin();
    header("Location: admin_home.php");
}
