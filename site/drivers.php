<?php require_once "header.php";
header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" href="css/driverTeam_style.css">

<div class="list">
        <?php
            $pilotes = afficherPilote_user();
            $i = 0;
            foreach($pilotes as $pilote):
                ?>
        <div class="<?= $pilote['code_constructeur'] ?> entire-driver<?php if($i % 2 == 1): ?> grid-margin-top<?php endif; ?>">
            <div class="pilotes-nom">
                <span class="first_name"> <?= $pilote['first_name'] ?> </span>   
                <span class="last_name">  <?= $pilote['last_name'] ?> </span>
            </div>
            <span class="constructeur">  <?= $pilote['constructeur'] ?> </span>
            <div class="pilote-info-photo">
                <div class="team-number">
                    <p class="numero num-<?= $pilote["code_constructeur"]?>">   <?= $pilote['numero'] ?> </p>
                </div>
                <img class="pilotes-img" src="img/pilotes/<?= $pilote['code'] ?>.png" alt="photo de <?= $pilote['last_name']?>" />
            </div>
        </div> 
        <?php $i++; ?>
        <?php endforeach; ?>
</div>    

<?php require_once "footer.php"; ?>
