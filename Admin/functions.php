<?php
require_once "../bdd/db_class.php";

/* function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
} */

function verif_utilisateur_admin()
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
    $test_admin = true;

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
            if($test_admin == $result['is_admin'])
            {
                $_SESSION['auth'] = $result;
                $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
                if(isset($_SESSION['auth']) && !empty($_SESSION['auth']))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
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

function affiche_membres()
{
    extract($_POST);

    try
    {
        $sql = "SELECT * FROM users";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute();

        $membres = $sth->fetchAll();

        if($membres)
        {
            return $membres;
        }
        else
        {
            echo "erreurs";
        }
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

function update_admin()
{
    extract($_GET);
    $admin = "admin";
    $superadmin = "superadmin";

    if(isset($id) && !empty($id))
    {
        if(strcmp($type, $admin) == 0)
        {
            try
            {
                $sql = "UPDATE users SET is_admin = 1 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
        }
        else if(strcmp($type, $superadmin) == 0 && $value == 0)
        {
            try
            {
                $sql = "UPDATE users SET is_admin = 1 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
        }
        else if(strcmp($type, $superadmin) == 0 && $value == 1)
        {
            try
            {
                $sql = "UPDATE users SET is_admin = FALSE WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
        }
    }
}

function supprime_compte()
{
    extract($_GET);

    if(isset($supprime) && !empty($supprime) )
    {
        $option = intval($option, 10);
        if($option === 1)
        {
            try
            {
                $sql = "DELETE FROM users WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($supprime));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function affichePilotes()
{
    try
    {
        $sql = "SELECT * FROM pilots WHERE still_driving = 1";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute();

        $results = $sth->fetchAll();

        $results = json_encode($results);
        return $results;
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

function afficheCircuits()
{
    try
    {
        $sql = "SELECT * FROM tracks";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute();

        $results = $sth->fetchAll();

        $results = json_encode($results);
        return $results;
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
}

function ajouterPilote()
{
    extract($_POST);
    //debug($_POST);
    $nom = htmlspecialchars($nom);
    $prenom = htmlspecialchars($prenom);
    $code = htmlspecialchars($code);

    if(!isset($nom, $prenom, $code))
    {
        return false;
    }
    else if(empty($nom) && empty($prenom) && empty($code))
    {
        return false;
    }

    try
    {
        $sql = "INSERT INTO pilots(first_name, last_name, code) VALUES(?, ?, ?);";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array($prenom, $nom, $code));


    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
    return true;
}

function piloteTeam()
{
    extract($_POST);

    $nom = htmlspecialchars($nom);
    $numero = htmlspecialchars($numero);
    $equipe = htmlspecialchars($equipe);

    if(!isset($nom, $numero, $code, $numero, $equipe))
    {
        return false;
    }
    else if(empty($nom) && empty($prenom) && empty($code) && empty($numero) && empty($equipe))
    {
        return false;
    }

    try
    {
        $sql = "INSERT INTO pilot_team(pilot_id, team_id, pilot_number) SELECT p.id, t.id, ? FROM pilots p, teams t WHERE p.last_name = ? AND t.name = ?; ";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array($numero, $nom, $equipe));
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
    return true;

}

function afficheEquipes()
{
    try
    {
        $sql = "SELECT * FROM teams";

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

function update_pilote()
{
    extract($_GET);
    //debug($_GET);
    $value = intval($value, 10);

    if(isset($id) && !empty($id)) 
    {
        if($value === 1)
        {
            try 
            {
                $sql = "UPDATE pilots SET still_driving = 0 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
        else if($value === 0)
        {
            try 
            {
                $sql = "UPDATE pilots SET still_driving = 1 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }
}

function affichePilotes_admin()
{
    try
    {
        $sql = "SELECT p.id, p.first_name, p.last_name, p.code, p.still_driving, pt.pilot_number as numero, t.name as constructeur FROM pilots p, pilot_team pt, teams t WHERE p.id = pt.pilot_id AND pt.team_id = t.id ORDER BY p.id ASC;";

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

function insererEquipe()
{
    extract($_POST);

    $equipe = htmlspecialchars($equipe);
    $moteur = htmlspecialchars($moteur);
    $monoplace = htmlspecialchars($monoplace);
    $code = htmlspecialchars($code);

    debug($_POST);

    if(!isset($equipe, $moteur, $monoplace, $code))
    {
        return false;
    }
    elseif(empty($equipe) && empty($moteur) && empty($monoplace) && empty($code))
    {
        return false;
    }

    try
    {
        $sql = "INSERT INTO teams(name, engine, car_name, code) VALUES(?, ?, ?, ?);";

        $db = new dbClass();
        $conn = $db->dbConnect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare($sql);
        $sth->execute(array($equipe, $moteur, $monoplace, $code));
    }
    catch(PDOException $e)
    {
        echo $e;
        return false;
    }
    return true;
}

function update_equipe()
{
    extract($_GET);
    //debug($_GET);
    $value = intval($value, 10);

    if(isset($id) && !empty($id)) 
    {
        if($value === 1)
        {
            try 
            {
                $sql = "UPDATE teams SET still_racing = 0 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
        else if($value === 0)
        {
            try 
            {
                $sql = "UPDATE teams SET still_racing = 1 WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($id));
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }
}

function supprime_pilote()
{
    extract($_GET);

    if(isset($supprime) && !empty($supprime) )
    {
        $option = intval($option, 10);
        if($option === 2)
        {
            try
            {
                $sql = "DELETE FROM pilots WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($supprime));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function supprime_equipe()
{
    extract($_GET);

    if(isset($supprime) && !empty($supprime) )
    {
        $option = intval($option, 10);
        if($option === 3)
        {
            try
            {
                $sql = "DELETE FROM teams WHERE id = ?";

                $db = new dbClass();
                $conn = $db->dbConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $conn->prepare($sql);
                $sth->execute(array($supprime));
            }
            catch(PDOException $e)
            {
                echo $e;
                return false;
            }
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}
