<?php
// On inclut la classe planète et le dossier .json
include("../class/planet.php");
$json = file_get_contents('../data/planets_details.json');
$planetsData = json_decode($json, true);
// On parcourt tout les planètes de notre liste de planètes
foreach ($planetsData as $planet) {
    $add_json_bdd = new Planet();
    // On ajoute chaque planète à la bdd
    $add_json_bdd->add_planet($planet);
}
echo "Fin de l'insertion ou de la modification des planetes";
