<?php

$servername = "localhost";
$username = "root";
$password = "dzer56Hr";
$bdd_name = "f1_website";


/**
 * initialise the connection.
 * Return null if failed, connection object if ok
 */
function create_database(){
    try{
        $conn = new PDO("mysql:host=$servername", $username, $password);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE " . $bdd_name;
    
        $sql->exec($sql);

        return conn;
    }
    
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
        return null;
    }
}

/**
 * 
 */
function create_table(){

}


?>
