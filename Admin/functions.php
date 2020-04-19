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
        echo $e;
        return false;
    }
}

/**
 * Create the tables
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

/**
 * Looks for admin accounts
 * Return true if exists, false otherwise
 */
function admin_exists(){
    try{
        $sql = "SELECT * FROM users WHERE is_admin = :is_admin";
        
        $db = new dbClass();
        $conn = $db->dbConnect();

        $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(':is_admin' => TRUE));
        
        $res = $sth->fetchAll();

        return count($res) > 0;
    }
    catch(PDOException $e){
        return false;
    }

    return false;
}

/**
 * Create an admin account
 * Return true if succesfully created
 */
function create_account(){
    extract($_POST);
    
    // if something is not set, we return false
    if(!(isset($lastName)
        && isset($firstName)
        && isset($birthdate)
        && isset($mail)
        && isset($pwd)
        && isset($nickname))
    ){
        return false;
    }



    try{
        $sql = "INSERT INTO users(first_name, last_name, birthdate, password, nickname, mail, is_admin) VALUES(?, ?, ?, ?, ?, ?, ?)";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);

        $sth->execute(array($firstName, $lastName, $birthdate, hash("sha256", $pwd), $nickname, $mail, TRUE));

        return true;
    }
    catch(PDOException $e){
        echo $e;
        return false;
    }

    return false;
}

