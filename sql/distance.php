<?php

include("../include/connexion.php");

try {
    if (!isset($departure) || !isset($arrival)) {
        header('Location: ../src/home.php');
    }


    $stmt = $cnx->prepare("SELECT X, Y, SubGridX, SubGridY FROM planet WHERE id = :id");
    $stmt->execute(['id' => $departure]);
    $result_departure = $stmt->fetch(PDO::FETCH_ASSOC);

    $X_departure = $result_departure['X'];
    $Y_departure = $result_departure['Y'];
    $SubGridX_departure = $result_departure['SubGridX'];
    $SubGridY_departure = $result_departure['SubGridY'];


    $stmt2 = $cnx->prepare("SELECT X, Y, SubGridX, SubGridY FROM planet WHERE id = :id");
    $stmt2->execute(['id' => $arrival]);
    $result_arrival = $stmt2->fetch(PDO::FETCH_ASSOC);

    $X_arrival = $result_arrival['X'];
    $Y_arrival = $result_arrival['Y'];
    $SubGridX_arrival = $result_arrival['SubGridX'];
    $SubGridY_arrival = $result_arrival['SubGridY'];


    $position_x_departure = ($X_departure + $SubGridX_departure) * 6;
    $position_y_departure = ($Y_departure + $SubGridY_departure) * 6;
    $position_x_arrival = ($X_arrival + $SubGridX_arrival) * 6;
    $position_y_arrival = ($Y_arrival + $SubGridY_arrival) * 6;


    if ($position_x_departure !== null && $position_y_departure !== null && $position_x_arrival !== null && $position_y_arrival !== null) {
        $distance_norounded = sqrt(
            pow($position_x_arrival - $position_x_departure, 2) +
            pow($position_y_arrival - $position_y_departure, 2)
        );
        $distance = round($distance_norounded, 2);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}
