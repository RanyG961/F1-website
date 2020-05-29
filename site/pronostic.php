<?php require_once "header.php"; ?>

<!-- <script src="pronostic_ajax.js"></script> -->
<script src="js/pronostic.fetch.js"></script>

<div id="divPrognosis">
    <div id="listeCircuits">

    </div>

    <div id="listePilote">

    </div>

    <?php if(is_logged()): ?>
        <input type="button" value="Confirmer" class="bouton" id="boutonPronostic"/>
    <?php endif; ?>
    
    </div>

<?php require_once "footer.php"; ?>
