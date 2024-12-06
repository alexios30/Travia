<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <?php
    include("../include/connexion.php");

    try {
        if (!isset($distance)) {
            header('Location: ../src/home.php');
            exit();
        }

        $stmt = $cnx->prepare("SELECT id, name, speed_kmh FROM ship");
        $stmt->execute();
        $results_ship = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $distance_km = $distance * 1e9;

        foreach ($results_ship as $result_ship) {
            $name = $result_ship["name"];
            $speed_kmh = $result_ship["speed_kmh"];

            $travel_time_hours = $distance_km / $speed_kmh;

            $days = floor($travel_time_hours / 24);
            $remaining_hours = $travel_time_hours - ($days * 24);
            $hours = floor($remaining_hours); // Full hours
            $minutes = ($remaining_hours - $hours) * 60;
            $minutes_rounded = round($minutes);

            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title"><?php echo htmlspecialchars($name); ?></h3>
                    <p class="card-text">
                        Time travel:
                        <?php
                        echo htmlspecialchars($days); ?> days,
                        <?php echo htmlspecialchars($hours); ?> hours, and
                        <?php echo htmlspecialchars($minutes_rounded); ?> minutes
                    </p>
                </div>
            </div>
            <?php
        }

    } catch (PDOException $e) {
        echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
    }
    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
