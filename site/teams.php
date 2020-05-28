<?php require_once "header.php";
header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" href="css/driverTeam_style.css">

<div id="teams">
        <?php
            $teams = afficherConstructeur_user();
            foreach($teams as $team):
        ?>
        <div id="<?= $team['constructeur']?>"> 
            <span class="constructeur"> <?= $team['constructeur'] ?> </span>   
            <span class="moteur"> <?= $team['moteur'] ?> </span>
            <span class="monoplace"> <?= $team['monoplace'] ?> </span>
            <img class="constructeurImg" src="img/monoplaces/<?= $team['monoplace'] ?>.png" alt="photo de <?= $team['constructeur'] ?>" />
                <?php $pilotes = piloteConstructeur($team['id']);
                      foreach($pilotes as $pilote):
                ?>
                    <span class="pilotes_fn"> <?= $pilote['last_name']?> </span>
                    <span class="pilotes_ln"> <?= $pilote['first_name']?> </span>
                    <img class="pilotesImg" src="img/pilotes/<?= $pilote['code'] ?>.png" alt="photo de <?= $pilote['last_name']?>" />
                <?php endforeach; ?>
        </div> 
        
        <?php endforeach; ?>
</div>    

<?php require_once "footer.php"; ?>