<?php require_once "header.php";
header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" href="css/driverTeam_style.css">

<div id="drivers">
        <?php
            $pilotes = afficherPilote_user();
            foreach($pilotes as $pilote):
        ?>
        <div id="<?= $pilote['code']?>"> 
            <span class="first_name"> <?= $pilote['first_name'] ?> </span>   
            <span class="last_name">  <?= $pilote['last_name'] ?> </span>
            <span class="numero">   <?= $pilote['numero'] ?> </span>
            <span class="constructeur">  <?= $pilote['constructeur'] ?> </span>
            <img class="pilotesImg" src="img/pilotes/<?= $pilote['code'] ?>.png" alt="photo de <?= $pilote['last_name']?>" />
        </div> 
        
        <?php endforeach; ?>
</div>    

<?php require_once "footer.php"; ?>