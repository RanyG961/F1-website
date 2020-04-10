<?php
class db_connection{
    private $servername = "localhost";
    private $username = "root";
    private $password = "dzer56Hr";
    private $db_name = "f1_website";

    /**
     * Return the name of the server
     */
    function getServername(){
        return $servername;
    }

    /**
     * Return the name of the user
     */
    function getUsername(){
        return $username;
    }

    /**
     * Return the password
     */
    function getPassword(){
        return $password;
    }

    /**
     * Return the name of the database
     */
    function getDbName(){
        return $db_name;
    }

    function dbConnect(){
        return new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    }
}



?>
