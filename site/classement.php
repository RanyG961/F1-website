<?php require_once "header.php"; ?>

<script src="classement_ajax.js"></script>

<div id="test">
    <input type="button" value="Pilotes" name="pilotes" id="pilotes" onclick="affichagePilote()" />
    <input type="button" value="Constructeurs" name="constructeurs" id="constructeurs" onclick="affichageConstructeur()" />
    <table id="tablePilote">
    </table>
    <table id="tableConstructeur"></table>
</div>

<?php require_once "footer.php"; ?>