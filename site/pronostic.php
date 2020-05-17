<?php require_once "header.php"; ?>

<!-- <script src="pronostic_ajax.js"></script> -->
<script src="pronostic.fetch.js"></script>

<form action="confirmation_prognosis.php" id="formPrognosis" method="post">
    <div id="listeCircuits">

    </div>

    <div id="listePilote">

    </div>

    <?php if(is_logged()): ?>
        <input type="submit" value="Confirmer" class="bouton" id="boutonPronostic"/>
    <?php endif; ?>
</form>

<?php require_once "footer.php"; ?>
