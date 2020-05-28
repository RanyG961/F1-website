<?php
class dbClass{
    private $servername = "localhost";
    private $username = "gr03731q";
    private $password = "TTUHGOOX";
    private $db_name = "gr03731q";

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
            echo $e;
            return null;
        }
    }
}
?>
