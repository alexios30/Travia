<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departure = $_POST['departure_id'] ?? '';
    $arrival = $_POST['arrival_id'] ?? '';

    // Vérifier si les champs sont remplis
    if (empty($departure) || empty($arrival)) {
        die("Les champs départ et arrivée ne peuvent pas être vides.");
    }
    include("../class/planet.php");
    $planet_departure = new Planet();
    $planet_departure->print_planet($departure);

    $planet_arrival = new Planet();
    $planet_arrival->print_planet($arrival);
}

