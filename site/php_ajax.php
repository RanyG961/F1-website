<?php

$data = file_get_contents($_GET["annee"] . "_races.json");

echo $data;
