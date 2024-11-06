<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Accueil</h1>
            <form method="post" action="travel.php" id="planet-form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="departure">Planète de Départ</label>
                        <input type="text" class="form-control" id="departure" placeholder="Sélectionnez la planète de départ">
                    </div>

                    <div class="col-md-6">
                        <label for="arrival">Planète d'Arrivée</label>
                        <input type="text" class="form-control" id="arrival" placeholder="Sélectionnez la planète d'arrivée">
                    </div>
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../scripts/AutoPlanet.js"></script>
