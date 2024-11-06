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
        <form id="planet-form">
            <div class="row">
                <div class="col-md-6">
                    <label for="departure">Planète de Départ</label>
                    <input type="text" id="departure" placeholder="Sélectionnez la planète de départ">
                </div>

                <div class="col-md-6">
                    <label for="arrival">Planète d'Arrivée</label>
                    <input type="text" id="arrival" placeholder="Sélectionnez la planète d'arrivée">
                </div>

                <div class="col-12">
                    <button type="submit">Rechercher</button>
                </div>

            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Charger les planètes depuis le back-end PHP
        $.getJSON("../sql/AutoPlanet.php", function(data) {
            // Vérifier si les données sont valides
            if (data && Array.isArray(data)) {
                // Activer l'auto-complétion pour les champs "départ" et "arrivée"
                $("#departure").autocomplete({
                    source: function(request, response) {
                        // Filtrer les planètes qui commencent par la chaîne entrée
                        var matches = $.map(data, function(planet) {
                            if (planet.toLowerCase().startsWith(request.term.toLowerCase())) {
                                return planet;
                            }
                        });
                        response(matches); // Retourner les résultats filtrés
                    },
                    minLength: 2, // Attendre que l'utilisateur écrive 2 caractères avant de proposer des suggestions
                    autoFocus: true // Pour que le premier élément soit sélectionné automatiquement
                });

                $("#arrival").autocomplete({
                    source: function(request, response) {
                        // Filtrer les planètes qui commencent par la chaîne entrée
                        var matches = $.map(data, function(planet) {
                            if (planet.toLowerCase().startsWith(request.term.toLowerCase())) {
                                return planet;
                            }
                        });
                        response(matches); // Retourner les résultats filtrés
                    },
                    minLength: 2, // Attendre que l'utilisateur écrive 2 caractères avant de proposer des suggestions
                    autoFocus: true // Pour que le premier élément soit sélectionné automatiquement
                });
            } else {
                console.error("Erreur lors de la récupération des planètes.");
            }
        });
    });
</script>


