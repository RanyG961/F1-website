<?php

$data = file_get_contents("races_json/" . $_GET["annee"] . "_races.json");

echo $data;
