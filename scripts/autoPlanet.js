$(document).ready(function() {
    $.getJSON("../sql/autoPlanet.php", function(data) {
        if (data && Array.isArray(data)) {
            var planetsMap = data.reduce(function(map, planet) {
                map[planet.name] = planet.id;
                return map;
            }, {});

            $("#departure").autocomplete({
                source: function(request, response) {
                    var matches = $.map(planetsMap, function(planetId, planetName) {
                        if (planetName.toLowerCase().startsWith(request.term.toLowerCase())) {
                            return planetName;
                        }
                    });
                    response(matches);
                },
                minLength: 3,
                autoFocus: true,
                select: function(event, ui) {

                    var selectedPlanetName = ui.item.value;
                    var planetId = planetsMap[selectedPlanetName];
                    $("#departure_id").val(planetId);
                }
            });

            $("#arrival").autocomplete({
                source: function(request, response) {
                    var matches = $.map(planetsMap, function(planetId, planetName) {
                        if (planetName.toLowerCase().startsWith(request.term.toLowerCase())) {
                            return planetName;
                        }
                    });
                    response(matches);
                },
                minLength: 3,
                autoFocus: true,
                select: function(event, ui) {
                    var selectedPlanetName = ui.item.value;
                    var planetId = planetsMap[selectedPlanetName];
                    $("#arrival_id").val(planetId);
                }
            });
        } else {
            console.error("Erreur lors de la récupération des planètes.");
        }
    });
});
