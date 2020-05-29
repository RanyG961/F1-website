<?php require_once "header.php"; 
header('Access-Control-Allow-Origin: *');  ?>

<script src="js/classement.fetch.js"></script>

<div id="classement">
    <ul id="classementGeneral">
        <li id="pilotes">
            Pilotes
        </li>
        <li id="constructeurs">
            Constructeurs
        </li>
        <li id="joueurs">
            Joueurs
        </li>
    </ul>
    <table id="tablePilote"></table>
    <table id="tableConstructeur"></table>
    <table id="tableJoueur"></table>
</div>

<?php require_once "footer.php"; ?>
