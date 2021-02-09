<?php
require_once "../site/functions_users.php";
require_once "functions.php";
?>

<?php if(ajouterPilote()): ?>
    <?php if(piloteTeam()): ?>
        <?= header("Location: pilotes.php"); ?>
        <script> alert("Inscription réussie"); </script>
    <?php else: ?>
        <?= header("Location: pilotes.php"); ?>
        <script> alert("Inscription échouée"); </script>
    <?php endif; ?>
<?php else: ?>
    
    <?= header("Location: pilotes.php"); ?>
    <script> alert("Inscription échouée"); </script>
<?php endif; ?>
