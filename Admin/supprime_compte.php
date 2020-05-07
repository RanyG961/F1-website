<?php
require_once "../site/functions_users.php";
init_session();

require_once "functions.php";

if ($_GET['supprime']) {
    supprime_compte();
    header("Location: admin_home.php");
}
