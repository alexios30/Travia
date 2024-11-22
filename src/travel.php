<!DOCTYPE html>
<html lang="fr">

<?php
if(!(isset($_POST['departure_id']) || isset($_POST['arrival_id']))){
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departure = $_POST['departure_id'] ?? '';
    $arrival = $_POST['arrival_id'] ?? '';

    // Vérifier si les champs sont remplis
    if (empty($departure) || empty($arrival)) {
        die("Les champs départ et arrivée ne peuvent pas être vides.");
    }
    include("../class/planet.php");
    $planet_departure = new Planet();
    $planet_arrival = new Planet();

    include("../sql/distance.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travia</title>
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <h1>Starting planet</h1>
            <?php
            $planet_departure->print_planet($departure);
            ?>
        </div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <h1>Arrival planet</h1>
            <?php
            $planet_arrival->print_planet($arrival);
            ?>
        </div>
        <div class="col-12">
            <h2>The distance between the planets is :
                <?php
                echo $distance;
                ?> billions of kilometers
            </h2>
        </div>
        <?php
        include("../sql/timetravel.php");
        ?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

