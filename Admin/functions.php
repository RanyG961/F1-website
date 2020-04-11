<?php
include "../bdd/db_class.php";


/**
 * initialise the connection.
 * Return false if failed, true otherwise
 */
function create_database(){
    $db_obj = new dbClass();
    try{

        $conn = new PDO("mysql:host=" . $db_obj->getServername(), $db_obj->getUsername(), $db_obj->getPassword());
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE " . $db_obj->getDbName();
    
        $conn->exec($sql);

        $conn = null;

        return true;
    }
    
    catch(PDOException $e){
        return false;
    }
}

/**
 * 
 */
function create_table(){
    $sql_script = file_get_contents("../bdd/bdd_tables.sql");

    if(!$sql_script){
        return false;
    }

    try{
        $db_obj = new dbClass();
        $conn = $db_obj->dbConnect();
    
        $conn->exec($sql_script);

        return true;
    }
    catch(PDOException $e){
        return false;
    }
}


?>
