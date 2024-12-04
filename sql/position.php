<?php

include("../include/connexion.php");

try {
    if (!isset($departure) || !isset($arrival)) {
        header('Location: ../src/home.php');
        exit();
    }

    // Récupérer les coordonnées du point de départ
    $stmt = $cnx->prepare("SELECT name, region, X, Y, SubGridX, SubGridY, diameter FROM planet WHERE id = :id");
    $stmt->execute(['id' => $departure]);
    $result_departure = $stmt->fetch(PDO::FETCH_ASSOC);

    $X_departure = $result_departure['X'];
    $Y_departure = $result_departure['Y'];
    $SubGridX_departure = $result_departure['SubGridX'];
    $SubGridY_departure = $result_departure['SubGridY'];

    // Récupérer les coordonnées du point d'arrivée
    $stmt2 = $cnx->prepare("SELECT name, region, X, Y, SubGridX, SubGridY, diameter FROM planet WHERE id = :id");
    $stmt2->execute(['id' => $arrival]);
    $result_arrival = $stmt2->fetch(PDO::FETCH_ASSOC);

    $X_arrival = $result_arrival['X'];
    $Y_arrival = $result_arrival['Y'];
    $SubGridX_arrival = $result_arrival['SubGridX'];
    $SubGridY_arrival = $result_arrival['SubGridY'];

    // Calculer les positions en milliards de kilomètres
    $position_x_departure_result = ($X_departure + $SubGridX_departure) * 6;
    $position_y_departure_result = ($Y_departure + $SubGridY_departure) * 6;
    $position_x_arrival_result = ($X_arrival + $SubGridX_arrival) * 6;
    $position_y_arrival_result = ($Y_arrival + $SubGridY_arrival) * 6;


} catch (PDOException $e) {
    // En cas d'erreur, envoyer un message JSON
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}
