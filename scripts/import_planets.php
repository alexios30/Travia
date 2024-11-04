<?php
include("../class/planet.php");
$json = file_get_contents('../data/planets_details.json');

$planetsData = json_decode($json, true);
foreach ($planetsData as $planet) {
    $add_json_bdd = new Planet();
    $add_json_bdd->add_planet($planet);
}
echo "Fin de l'insertion des  planetes";
?>