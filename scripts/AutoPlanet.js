$(document).ready(function() {
    // Charger les planètes depuis le back-end PHP
    $.getJSON("../sql/AutoPlanet.php", function(data) {
        // Vérifier si les données sont valides
        if (data && Array.isArray(data)) {
            // Extraire les noms des planètes dans un tableau et créer un objet pour lier les noms aux IDs
            var planetsMap = data.reduce(function(map, planet) {
                map[planet.name] = planet.id; // Associer le nom de la planète à son ID
                return map;
            }, {});

            // Activer l'auto-complétion pour le champ "départ"
            $("#departure").autocomplete({
                source: function(request, response) {
                    // Filtrer les planètes qui commencent par la chaîne entrée
                    var matches = $.map(planetsMap, function(planetId, planetName) {
                        if (planetName.toLowerCase().startsWith(request.term.toLowerCase())) {
                            return planetName;
                        }
                    });
                    response(matches); // Retourner les résultats filtrés
                },
                minLength: 3, // Attendre que l'utilisateur écrive 3 caractères avant de proposer des suggestions
                autoFocus: true, // Pour que le premier élément soit sélectionné automatiquement
                select: function(event, ui) {
                    // Lorsque l'utilisateur sélectionne une planète, mettre à jour le champ caché avec l'ID de la planète
                    var selectedPlanetName = ui.item.value;
                    var planetId = planetsMap[selectedPlanetName];
                    $("#departure_id").val(planetId); // Mettre à jour l'ID de la planète dans le champ caché
                }
            });

            // Activer l'auto-complétion pour le champ "arrivée"
            $("#arrival").autocomplete({
                source: function(request, response) {
                    // Filtrer les planètes qui commencent par la chaîne entrée
                    var matches = $.map(planetsMap, function(planetId, planetName) {
                        if (planetName.toLowerCase().startsWith(request.term.toLowerCase())) {
                            return planetName;
                        }
                    });
                    response(matches); // Retourner les résultats filtrés
                },
                minLength: 3, // Attendre que l'utilisateur écrive 3 caractères avant de proposer des suggestions
                autoFocus: true, // Pour que le premier élément soit sélectionné automatiquement
                select: function(event, ui) {
                    // Lorsque l'utilisateur sélectionne une planète, mettre à jour le champ caché avec l'ID de la planète
                    var selectedPlanetName = ui.item.value;
                    var planetId = planetsMap[selectedPlanetName];
                    $("#arrival_id").val(planetId); // Mettre à jour l'ID de la planète dans le champ caché
                }
            });
        } else {
            console.error("Erreur lors de la récupération des planètes.");
        }
    });
});
