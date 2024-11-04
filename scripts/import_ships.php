<?php
    // On inclut la classe ship et le dossier .json
    include("../class/ship.php");
    $json = file_get_contents('../data/ships.json');
    $vaisseauxData = json_decode($json, true);

    // On parcourt tout les vaisseaux de notre liste de vaisseau
    foreach ($vaisseauxData as $vaisseau) {
        $add_json_bdd = new Ship();
        // On ajoute chaque vaisseau à la bdd
        $add_json_bdd->add_ship($vaisseau);
    }
echo "Fin de l'insertion ou de la modification des vaisseaux";


