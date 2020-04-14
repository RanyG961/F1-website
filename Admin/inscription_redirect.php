<?php
include "functions.php";

if(create_account()){
    header("Location: connexion.php");
}
else{
    header("Location: bdd_install.php");
}

?>
