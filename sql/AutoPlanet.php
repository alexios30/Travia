<?php
include("../include/connexion.php");

try {
    // Préparer la requête SQL pour récupérer les IDs et les noms des planètes
    $stmt = $cnx->prepare("SELECT id, name FROM planet");
    $stmt->execute();

    // Initialiser un tableau pour stocker les résultats
    $planets = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Ajouter chaque planète avec son ID et son nom
        $planets[] = [
            "id" => $row['id'],
            "name" => $row['name']
        ];
    }
    // Retourner les données au format JSON
    echo json_encode($planets);

} catch (PDOException $e) {
    // Gérer les erreurs et les retourner en JSON
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
}
