<?php
require_once "../site/functions_users.php";
$_SESSION = array();
clean_session();
header ("Location: install_new_account_form.php");