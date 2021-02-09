<?php require_once "header.php";
header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" href="css/driverTeam_style.css">

<div class="list">
       <?php
        $teams = afficherConstructeur_user();
        $i = 0;
        foreach ($teams as $team) :
        ?>
    
            <div class="<?= $team['code'] ?> entire-team<?php if($i % 2 == 1): ?> grid-margin-top<?php endif; ?>">
                <div class="constructeur-info">
                    <div class="constructeur-nom">
                        <span class="constructeur"> <?= $team['constructeur'] ?> </span>
                        <span class="moteur"> <?= $team['moteur'] ?> </span>
                        <span class="monoplace"> <?= $team['monoplace'] ?> </span>
                    </div>
                    <img class="constructeur-logo" src="img/logoCons/<?= $team['code'] ?>.png" alt="Logo de l'équipe"/>
                </div>
                <img class="constructeurImg" src="img/monoplaces/<?= $team['monoplace'] ?>.png" alt="photo de <?= $team['constructeur'] ?>" />
                <div class="pilotes">
                    <?php $pilotes = piloteConstructeur($team['id']);
                    foreach ($pilotes as $pilote) :
                    ?>
                        <div class="pilote-info">
                            <div class="pilote-nom">
                                <span class="pilotes_fn"> <?= $pilote['first_name'] ?> </span>
                                <span class="pilotes_ln"> <?= $pilote['last_name'] ?> </span>
                            </div>
                            <img class="pilotesImg" src="img/pilotes/<?= $pilote['code'] ?>.png" alt="photo de <?= $pilote['last_name'] ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php $i++; ?>
        <?php endforeach; ?>
           
</div>

<?php require_once "footer.php"; ?>
