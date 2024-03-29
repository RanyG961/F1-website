<?php
require_once "../bdd/db_class.php";

function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
}


/**
 * Verify if nickname is available and valid
 * Return nothing
 */
function nickname_exists()
{
    extract($_POST);
    $errors = array();
    $pseudo = htmlspecialchars($pseudo);

    if(empty($pseudo) || !preg_match('/^[a-zA-Z0-9_]+$/', $pseudo))
    {
        $errors['pseudo'] = "Votre pseudo n'est pas valide";
        return "is_nickname=true&";
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
            return "is_nickname=true&";
        }
        else 
        {
            return "";
        }
    }
    catch(PDOException $e)
    {
        echo $e;
        return "is_nickname=true&";
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
        return "is_email=true&";
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
            return "is_email=true&";
        }
        else 
        {
            return "";
        }
    }
    catch(PDOException $e)
    {
        echo $e;
        return "is_email=true&";
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

    if(empty($pwd) || empty($pwdConfirm))
    {
        $errors['pwd'] = "Problème dans la confirmation du mot de passe";
        return "is_pwd=true&";
    }
    if($pwd != $pwdConfirm)
    {
        return "is_pwd=true&is_pwd_confirm=true&";
    }
    else if($longueur_pwd < 6 || !preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $pwd))
    {
        echo "Le mot de passe n'est pas conforme";
        return "is_pwd=true&";
    }
    else 
    {
        return "";
    }
} 

/**
 * Create a user account$pseudo = htmlspecialchars($pseudo);
 * Return true if succesfully created
 */
function create_account($is_admin){
    extract($_POST);
    echo $is_admin;
    // if something is not set, we return false
    if(!(isset($nom)
        && isset($prenom)
        && isset($pseudo)
        && isset($birthdate)
        && isset($email)
        && isset($pwd)
        && isset($pwdConfirm)))
    {
        return false;
    }

    if($is_admin === 1)
    {
        if(!(isset($acceptTerms) && isset($tel)))
        {
            return false;
        }
    }

    $nom = htmlspecialchars($nom);
    $prenom = htmlspecialchars($prenom);
    $pwd = htmlspecialchars($pwd);
    $pwd = hash("sha256", $pwd);
    $pseudo = htmlspecialchars($pseudo);
    $birthdate = $birthdate;
    $email = htmlspecialchars($email);


    try{
        $sql = "INSERT INTO users(first_name, last_name, birthdate, password, nickname, mail, is_admin) VALUES(?, ?, ?, ?, ?, ?, ?)";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array($prenom, $nom, $birthdate, $pwd, $pseudo, $email, $is_admin));

        echo "salut";
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
    $identifiant = htmlspecialchars($identifiant);
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

function is_logged()
{
    if(isset($_SESSION['auth']))
    {
        return true;
    }
    return false;
}



/** 
 * if (session_status() == PHP_SESSION_NONE)
 * if(isset($_SESSION['auth']))
 */

/** 
 * Retrieve the data fetched from  pronostic.php 
 * Insert the data retrived to the database table prognosis
 */
function insert_pronostic()
 {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    //var_dump($data);

    $userID = $_SESSION["auth"]["id"];
    $circuitID = $data[0]["circuitID"];

    /* echo $data[0]["Nom"] . "\n";
    echo "id : " . $userID . " au : " . $circuitID."\n"; */

    try
    {
        $sql = "INSERT INTO prognosis(user_id, race_id, pilot_id, position) VALUES(?, ?, ?, ?)";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare($sql);
        
        for($i = 0; $i < count($data); $i++)
        {
            $piloteID = $data[$i]["piloteID"];
            $rang = $data[$i]["Rang"];
            //echo "Pilote: ".$piloteID." Rang: ".$rang."\n";
            $pronostic = array($userID, $circuitID, $piloteID, $rang);
            $sth->execute($pronostic);
        }
        return true;
    } 
    catch(PDOException $e)
    {
        echo $e; 
        return false;
    }  
 }

function modifierProfil()
{
    extract($_POST);
    $errors = [];


    if(isset($pseudo) && !empty($pseudo) && (strcmp($_SESSION["auth"]["nickname"],$pseudo) != 0))
    {
        $pseudo = htmlspecialchars($pseudo);
        try
        {
            $sql = "UPDATE users SET nickname = ? WHERE id = ?";

            $db = new dbClass();
            $conn = $db->dbConnect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sth = $conn->prepare($sql);
            $sth->execute(array($pseudo, $_SESSION["auth"]["id"]));

            $_SESSION["auth"]["nickname"] = $pseudo;
            return true;
        }
        catch(PDOException $e)
        {
            echo $e;
            return false;
        }
    }
    elseif(isset($email) && !empty($email))
    {
        $email = htmlspecialchars($email);
        try
        {
            $sql = "UPDATE users SET mail = ? WHERE id = ?";

            $db = new dbClass();
            $conn = $db->dbConnect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sth = $conn->prepare($sql);
            $sth->execute(array($email, $_SESSION["auth"]["id"]));

            $_SESSION["auth"]["mail"] = $email;
            return true;
        }
        catch(PDOException $e)
        {
            echo $e;
            return false;
        }
    }
    elseif(isset($pwd, $pwdConfirm) && !empty($pwd) && !empty($pwdConfirm))
    {
        $pwd = htmlspecialchars($pwd);
        $pwd = hash("sha256", $pwd);

        try
        {
            $sql = "UPDATE users SET password = ? WHERE id = ?";

            $db = new dbClass();
            $conn = $db->dbConnect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sth = $conn->prepare($sql);
            $sth->execute(array($pwd, $_SESSION["auth"]["id"]));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e;
            return false;
        }
    }
    return false;
}

function pronosticExist()
{
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    $userID = $_SESSION["auth"]["id"];
    $circuitID = $data[0]["circuitID"];

    try
    {
        $sql = "SELECT * FROM prognosis WHERE user_id = :userID AND race_id = :circuitID";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare($sql);
        
        $sth->execute(array(':userID' => $userID, ':circuitID' => $circuitID));

        $result = $sth->fetch();

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    } 
    catch(PDOException $e)
    {
        echo $e; 
        return false;
    }  
}

function fetchResultat()
{
    $json = file_get_contents("php://input");
    $circuitID = json_decode($json, true);
    $userID = $_SESSION["auth"]["id"];

    try
    {
        $sql = " SELECT pilots.id, pilots.last_name, prognosis.position FROM pilots, prognosis WHERE pilots.id = prognosis.pilot_id AND prognosis.race_id = :circuitID AND prognosis.user_id = :userID;";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare($sql);
        
        $sth->execute(array(':circuitID' => $circuitID, 'userID' => $userID));

        $result = $sth->fetchAll();


        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    } 
    catch(PDOException $e)
    {
        echo $e; 
        return false;
    }  
}

function insert_resultatCourse()
{
    $i = 0; 
    $json = file_get_contents("2019_races.json");

    $raceResult = json_decode($json, true);
    $raceResult = $raceResult["MRData"]["RaceTable"]["Races"];
    $nbPilotes = $raceResult[$i]["Results"];


    try
    {
        $sql = "INSERT INTO race_results(race_id, pilot_id, position) SELECT tracks.id, pilots.id, ? FROM tracks, pilots WHERE tracks.circuitID = ? AND pilots.code = ?";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare($sql);

        
        for($i = 0; $i < count($raceResult); $i++)
        {
            for($j = 0; $j < count($nbPilotes); $j++)
            {
                $pilotesCode  = $raceResult[$i]["Results"][$j]["Driver"]["code"];
                $pilotesPosition = $raceResult[$i]["Results"][$j]["position"];
                $course = $raceResult[$i]["Circuit"]["circuitId"];
                //$time = $raceResult[$i]["Results"][$j]["Time"]["time"];

                $res = array($pilotesPosition, $course, $pilotesCode);

                $sth->execute($res);
            }
        }
    } 
    catch(PDOException $e)
    {
        echo $e; 
        return false;
    } 
} 

function position()
{
    try
    {
        $sql = " SELECT u.nickname AS user_nickname,  r.race_id AS raceResultat_raceID, p.race_id AS pronostic_raceID, p.pilot_id AS pronostic_pilotID, p.position AS pronostic_position, r.pilot_id AS raceResultat_pilotID, r.position AS raceResultat_position FROM prognosis p, race_results r, users u WHERE r.pilot_id = p.pilot_id AND p.race_id = r.race_id AND u.id = p.user_id";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $conn->prepare($sql);
        
        $sth->execute();

        $result = $sth->fetchAll();



        if($result)
        {
            $result = json_encode($result, true);
            file_put_contents("races_json/position.json", $result);
        }
        else
        {
            return false;
        }
    } 
    catch(PDOException $e)
    {
        echo $e; 
        return false;
    }  
}

function afficherPilote_user()
{
    try
    {
        $sql = "SELECT t.code as code_constructeur, p.first_name, p.last_name, p.code, pt.pilot_number as numero, t.name as constructeur FROM pilots p, pilot_team pt, teams t WHERE p.id = pt.pilot_id AND pt.team_id = t.id AND p.still_driving = 1;";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute();

        $results = $sth->fetchAll();

        return $results;
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

function afficherConstructeur_user()
{
    try
    {
        $sql = "SELECT t.id, t.code, t.name AS constructeur, t.engine AS moteur, t.car_name AS monoplace FROM teams t;";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute();

        $results = $sth->fetchAll();

        return $results;
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

function piloteConstructeur($constructeur)
{
    try
    {
        $sql = "SELECT p.first_name, p.last_name, p.code FROM teams t, pilots p, pilot_team pt WHERE t.id = :constructeur AND p.id = pt.pilot_id AND pt.team_id = t.id AND p.still_driving = 1;";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array(':constructeur' => $constructeur));

        $results = $sth->fetchAll();

        return $results;
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}
