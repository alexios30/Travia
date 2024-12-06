<!DOCTYPE html>
<html lang="fr">
<?php
if (!(isset($_POST['departure']) || isset($_POST['arrival']))) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departure = $_POST['departure'] ?? '';
    $arrival = $_POST['arrival'] ?? '';

    // Vérifier si les champs sont remplis
    if (empty($departure) || empty($arrival)) {
        die("Les champs départ et arrivée ne peuvent pas être vides.");
    }
}

include('../sql/position.php');

try {
    $stmt = $cnx->prepare("
        SELECT name, region, X, Y, SubGridX, SubGridY, diameter 
        FROM planet 
        WHERE id NOT IN (:departure, :arrival)
    ");
    $stmt->execute([
        ':departure' => $departure,
        ':arrival' => $arrival
    ]);

    $planets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calcul des coordonnées pour toutes les planètes
    foreach ($planets as &$planet) {
        $planet['X'] = ($planet['X'] + $planet['SubGridX']) * 6;
        $planet['Y'] = ($planet['Y'] + $planet['SubGridY']) * 6;
    }

    $planetsJson = json_encode($planets);

} catch (PDOException $e) {
    // En cas d'erreur, envoyer un message JSON
    echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
    exit;
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travia - Map</title>
    <link rel="stylesheet" href="../css/map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="content">
            <h1>Map</h1>
            <div class="map" id="map"></div>
        </div>
    </div>
</div>

<script>
    const mapData = {
        departure: {
            name: <?= json_encode($result_departure['name']); ?>,
            coordinates: [<?= $position_y_departure_result; ?>, <?= $position_x_departure_result; ?>],
            region: <?= json_encode($result_departure['region']); ?>,
            diameter: <?= json_encode($result_departure['diameter']); ?>
        },
        arrival: {
            name: <?= json_encode($result_arrival['name']); ?>,
            coordinates: [<?= $position_y_arrival_result; ?>, <?= $position_x_arrival_result; ?>],
            region: <?= json_encode($result_arrival['region']); ?>,
            diameter: <?= json_encode($result_arrival['diameter']); ?>
        },
        allPlanets: <?= $planetsJson; ?>
    };
</script>

<script src="../scripts/map.js"></script>
</body>
</html>