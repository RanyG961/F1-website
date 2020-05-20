<?php 
require_once "functions.php";

$pilotes = affichePilotes();
$circuits = afficheCircuits();

echo "Pilotes: \n". $pilotes . "\n";
echo "CIRCUITS : \n" . $circuits  . "\n";

file_put_contents("pilotes_2019.json", $pilotes);
file_put_contents("circuits_2019.json", $circuits);

