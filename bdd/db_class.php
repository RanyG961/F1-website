<?php
class dbClass{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "dzer56Hr";
    private $db_name = "f1_website";

    /**
     * Return the name of the server
     */
    function getServername(){
        return $this->servername;
    }

    /**
     * Return the name of the user
     */
    function getUsername(){
        return $this->username;
    }

    /**
     * Return the password
     */
    function getPassword(){
        return $this->password;
    }

    /**
     * Return the name of the database
     */
    function getDbName(){
        return $this->db_name;
    }

    function dbConnect(){
        try {
            return new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->username, $this->password);
        }
        catch(PDOException $e){
            return null;
        }
    }
}



?>
