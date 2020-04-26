<?php
include "../bdd/db_class.php";



function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

/**
 * Verify if nickname is available and valid
 * Return true if nickname is available and valid
 */
function nickname_exists()
{
    extract($_POST);
    $errors = array();
    if(empty($pseudo) || !preg_match('/^[a-zA-Z0-9_]+$/', $pseudo))
    {
        $errors['pseudo'] = "Votre pseudo n'est pas valide";
        return "?is_nickname=true";
    }

    try
    {
        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare('SELECT id FROM users WHERE nickname = ?');
        $sth->execute(array($pseudo));

        $user = $sth->fetch();
        if($user)
        {
            $errors['pseudo'] = "Ce pseudo existe déjà !";
            return "?is_nickname=true";
        }
        else 
        {
            return "";
        }
    }
    catch(PDOException $e)
    {
        echo $e;
        return "?is_nickname=true";
    }
}

/**
 * Verify if email is available and valid
 * Return true if nickname is available and valid
 */
function email_exists()
{
    extract($_POST);
    $errors = array();
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['mail'] = "Votre email n'est pas valide";
        return false;
    }

    try
    {
        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare('SELECT id FROM users WHERE mail = ?');
        $sth->execute(array($email));

        $user = $sth->fetch();
        if($user)
        {
            $errors['mail'] = "Ce mail existe déjà !";
            return false;
        }
        else 
        {
            return true;
        }
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

/**
 * Check if the password is valid
 * Return true if the password is valid and the confirm password is the same 
 */
function password_est_valide()
{
    extract($_POST);
    $errors = array();

    $longueur_pwd = strlen($pwd);

    if(empty($pwd) || empty($pwdConfirm) || $pwd != $pwdConfirm)
    {
        $errors['pwd'] = "Problème dans la confirmation du mot de passe";
        return false;
    }
    else if($longueur_pwd < 6 || !preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $pwd))
    {
        echo "Le mot de passe n'est pas conforme";
        return false;
    }
    else 
    {
        return true;
    }
} 

/**
 * Create a user account
 * Return true if succesfully created
 */
function create_account(){
    extract($_POST);
    $errors = array();
    
    // if something is not set, we return false
    if(!(isset($nom)
        && isset($prenom)
        && isset($pseudo)
        && isset($birthdate)
        && isset($email)
        && isset($pwd)
        && isset($pwdConfirm)
        && isset($tel))
    ){
        return false;
    }

    try{
        $sql = "INSERT INTO users(first_name, last_name, birthdate, password, nickname, mail, is_admin) VALUES(?, ?, ?, ?, ?, ?, ?)";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array($prenom, $nom, $birthdate, hash("sha256", $pwd), $pseudo, $email, 0));
    }
    catch(PDOException $e){
        echo $e;
        return false;
    }

    return true;
}

/**
 * Init session() properly
 * Return true if the session started or false if not
 */
function init_session()
{
    if(!session_id())
    {
        session_start();
        session_regenerate_id();
        return true;
    }

    return false;
}

/** 
 * Destroy session() properly
 */
function clean_session()
{
    session_unset();
    session_destroy();
}

function verif_utilisateur()
{
    extract($_POST);
    $errors = array();

    if(!(isset($identifiant) && isset($pwd)))
    {
        return false;
    }

    if(empty($identifiant) && empty($pwd))
    {
        return false;
    }
    $password_clear = hash("sha256", $pwd);

    try
    {
        $sql = "SELECT * FROM users WHERE (nickname = :identifiant OR mail = :identifiant) AND password = :password_clear";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array(':identifiant' => $identifiant, ':password_clear' => $password_clear));

        $result = $sth->fetch();

        if($result)
        {
            $_SESSION['auth'] = $result;
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
            return true;
        }
        else
        {
            $_SESSION['flash']['error'] = "Identifiant ou mot de passe incorrect";
            return false;
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        return false;
    }
    return true;
}

/**
 * if (session_status() == PHP_SESSION_NONE)
 * if(isset($_SESSION['auth']))
 */
