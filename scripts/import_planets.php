<?php
include("../class/planet.php");
$json = file_get_contents('../data/planets_details.json');
$add_json_bdd = new Planet();
$add_json_bdd->add_planets($json);
?>