<?php

include("../include/connexion.php");

try {
    if (!isset($departure)) {
        throw new Exception("La variable \$departure n'est pas définie.");
    }
    $stmt = $cnx->prepare("SELECT distance FROM planet WHERE id = :id");
    $stmt->execute(['id' => $departure]);

    $result_distance_departure = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result_distance_departure && isset($result_distance_departure['distance'])) {
        $distance_departure = (int) $result_distance_departure['distance'];
    }
} catch (PDOException $e) {
    // Gérer les erreurs PDO
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}
