<?php
include("../include/connexion.php");

try {
    $stmt = $cnx->prepare("SELECT name FROM planet");
    $stmt->execute();
    $planets = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $planets[] = $row['name'];
    }

    echo json_encode($planets);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}

