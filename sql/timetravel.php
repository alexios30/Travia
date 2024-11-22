<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Inclure le CSS ici ou dans un fichier CSS externe */
        body {
            background-image: url('../img/galaxy.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            height: 100vh; /* Assurez-vous que le corps occupe toute la hauteur de la fenêtre */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <?php
        include("../include/connexion.php");

        try {
            if (!isset($distance)) {
                header('Location: ../src/home.php');
                exit();
            }

            // Récupérer les informations des vaisseaux
            $stmt = $cnx->prepare("SELECT id, name, speed_kmh FROM ship");
            $stmt->execute();
            $results_ship = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $distance_km = $distance * 1e9;

            foreach ($results_ship as $result_ship) {
                $name = $result_ship["name"];
                $speed_kmh = $result_ship["speed_kmh"];

                // Calculer le temps de voyage en heures
                $travel_time_hours = $distance_km / $speed_kmh;

                // Séparer les heures et les minutes
                $hours = floor($travel_time_hours);
                $minutes = ($travel_time_hours - $hours) * 60;

                // Arrondir les minutes au centième près
                $minutes_rounded = round($minutes, 2);
                ?>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($name); ?></h3>
                            <p class="card-text">Time travel: <?php echo htmlspecialchars($hours); ?> heures et <?php echo htmlspecialchars($minutes_rounded); ?> minutes</p>
                        </div>
                    </div>
                </div>
                <?php
            }

        } catch (PDOException $e) {
            echo json_encode(["error" => "Erreur de connexion ou de requête : " . $e->getMessage()]);
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
