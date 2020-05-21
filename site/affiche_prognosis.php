<?php
include "functions_users.php";
init_session();

$res = fetchResultat();

if($res)
{
    print_r(json_encode($res));
}
else
{
    return false;
}
