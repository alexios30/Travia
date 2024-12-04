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
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travia - Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Map</h1>
            <div id="map" style="height: 600px; width: 100%;"></div>
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
        }
    };
</script>

<script src="../scripts/map.js"></script>
</body>
</html>
