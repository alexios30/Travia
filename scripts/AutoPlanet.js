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
                minLength: 3, // Attendre que l'utilisateur écrive 2 caractères avant de proposer des suggestions
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
                minLength: 3, // Attendre que l'utilisateur écrive 2 caractères avant de proposer des suggestions
                autoFocus: true // Pour que le premier élément soit sélectionné automatiquement
            });
        } else {
            console.error("Erreur lors de la récupération des planètes.");
        }
    });
});