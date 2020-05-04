<?php
require_once "functions_users.php";
init_session();
clean_session();
header ("Location: home.php");