<?php

include("../include/connexion.php");

try {
    if (!isset($departure) && isset($arrival)) {
        throw new Exception("La variable \$departure n'est pas définie.");
    }
    $stmt = $cnx->prepare("SELECT distance FROM planet WHERE id = :id");
    $stmt->execute(['id' => $departure]);
    $result_distance_departure = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt2 = $cnx->prepare("SELECT distance FROM planet WHERE id = :id");
    $stmt2->execute(['id' => $arrival]);
    $result_distance_arrival = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($result_distance_departure && isset($result_distance_departure['distance'])&&$result_distance_arrival && isset($result_distance_arrival['distance'])) {
        $distance_departure = (int) $result_distance_departure['distance'];
        $distance_arrival = (int) $result_distance_arrival['distance'];
        $difference = abs($distance_departure - $distance_arrival);
    }
} catch (PDOException $e) {
    // Gérer les erreurs PDO
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}
