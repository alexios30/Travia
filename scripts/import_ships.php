<?php
    include("../class/ship.php");
    $json = file_get_contents('../data/ships.json');
    $add_json_bdd = new Ship();
    $add_json_bdd->add_ships($json);
?>
