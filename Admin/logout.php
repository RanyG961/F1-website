<?php
require_once "../site/functions_users.php";
init_session();
clean_session();
header ("Location: admin_home.php");