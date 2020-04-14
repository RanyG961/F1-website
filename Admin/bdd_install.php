<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title> Installation </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        include "functions.php";
    ?>
    <div id="all">
    <?php
    
    $is_db = create_database();

    $is_table = create_table() && !admin_exists();

    if($is_table){
        include "install_new_account_form.php";
    }
    else{
        include "go_to_admin_page.php";
    }

    ?>
    </div>

</body>

</html>
