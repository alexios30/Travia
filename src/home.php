<!DOCTYPE html>
<html lang="fr">
<?php
include("../src/navbar.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
<div class="container">
    <div class="row form mt-5">
        <h1>Home</h1>
        <form method="post" action="travel.php" id="planet-form">
            <div class="row">
                <div class="col-md-6 planet">
                    <label for="departure">Starting planet</label>
                    <input type="hidden" name="departure_id" id="departure_id">
                    <input type="text" class="form-control" name="departure" id="departure"
                           placeholder="Select the starting planet" required>
                </div>
                <div class="col-md-6 planet">
                    <label for="arrival">Arrival planet</label>
                    <input type="hidden" name="arrival_id" id="arrival_id">
                    <input type="text" class="form-control" name="arrival" id="arrival"
                           placeholder="Select the arrival planet" required>
                </div>
                <div class="col-12 mt-5 d-flex justify-content-center">
                    <button type="submit" class="btn button">Research</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../scripts/autoPlanet.js"></script>

</body>

</html>
