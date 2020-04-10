<?php 
    require 'header.php'; 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title> F1 Pronostic </title>
    <link rel="stylesheet" href="css/home_style.css">
</head>

<body>
    <div id="all">
        <ul>
            <div id="presentationF1">
                <p> 
                    La Formule 1 aussi appelé F1, est une des fameuses discipline du sport automobile, elle est aussi considérée comme la catégorie reine de ce sport.
                    ...
                </p>
            </div>
            <div id="presentationSite">
                <p>
                    ...
                </p>
            </div>
            <div id="tweets">
            <a class="twitter-timeline" href="https://twitter.com/F1?ref_src=twsrc%5Etfw">Tweets by F1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div id="classement">
                <h2> Classement </h2>
                <table>
                    <tr> Pilotes </tr>
                    <tr> Écuries </tr>
                    <tr> Grand Prix </tr>
                    <tr> Joueurs </tr>
                </table>
            </div>
        </ul>

        <?php
            require 'footer.php';
        ?>  
    </div>
</body>

</html>