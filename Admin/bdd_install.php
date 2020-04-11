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

    if($is_db){
        $is_table = create_table();
        if($is_table){
            include "install_new_account_form.php";
        }
    }
    else{
        echo "The database already exists!";
    }

    ?>
    </div>

</body>

</html>
