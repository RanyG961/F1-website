<?php
require_once "functions_users.php";
init_session();
?>

<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Index</title>
    <link rel="stylesheet" href="css/helmet_checkbox.css">
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/inscriptionConnexion_style.css">
    <link rel="stylesheet" href="css/classement_style.css">
</head>

<body>
    
        <header>
        <?php if(is_logged()): ?>
            <div id="connexion">
                <ul>
                    <li>
                        <a href="profil.php"> Editer mon profil <?= $_SESSION['auth']['nickname']; ?> </a>
                    </li>
                    <li>
                        <span> | </span>
                    </li>
                    <li>
                        <a href="logout.php"> Se déconnecter </a>
                    </li>

                </ul>
            </div>
        <?php else: ?>
            <div id="connexion">
                <ul>
                    <li>
                        <a href="connexion.php"> Se connecter </a>
                    </li>
                    <li>
                        <span> | </span>
                    </li>
                    <li>
                        <a href="inscription.php"> S'inscrire </a>
                    </li>

                </ul>
            </div>
        <?php endif; ?>
            <nav id="headerMenu">
                <ul>
                    <li>
                        <a href="home.php">
                            <img id="logo" src="img/logo.png" alt="F1-logo" />
                        </a>
                    </li>

                    <li>
                        <a href="pronostic.php"> Pronostic </a>
                    </li>

                    <li>
                        <a href="teams.php"> Équipes </a>
                    </li>

                    <li>
                        <a href="drivers.php"> Pilotes </a>
                    </li>

                    <li>
                        <a href="classement.php"> Classement </a>
                    </li>

                    <li>
                        <a href="calendrier.php"> Calendrier </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="all"> 
