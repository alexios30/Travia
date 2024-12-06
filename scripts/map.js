const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -8,
    attributionControl:false
});

const bounds = [[0, 0], [1000, 1000]];
map.fitBounds(bounds);

document.getElementById('map').style.backgroundColor = 'black';
// Couleurs associées aux régions
var regionColors = {
    'Deep Core': '#1f77b4',  // Bleu classique
    'Core': '#ff7f0e',       // Orange chaud
    'Colonies': '#2ca02c',   // Vert vibrant
    'Expansion Region': '#d62728',  // Rouge profond
    'Extragalactic': '#9467bd',     // Violet doux
    'Hutt Space': '#8c564b',        // Marron chaud
    'Inner Rim Territories': '#e377c2',  // Rose éclatant
    'Mid Rim Territories': '#7f7f7f',    // Gris neutre
    'Outer Rim Territories': '#bcbd22',  // Vert olive vif
    'Talcene Sector': '#17becf',         // Bleu ciel doux
    'The Centrality': '#aec7e8',         // Bleu pastel
    'Tingel Arm': '#ffbb78',             // Orange pastel
    'Wild Space': '#98df8a'              // Vert menthe clair
};


const departureCoordinates = mapData.departure.coordinates;
const arrivalCoordinates = mapData.arrival.coordinates;
const departureDiameter = mapData.departure.diameter;
const arrivalDiameter = mapData.arrival.diameter;

function getDiameterScale(diameter) {
    if (diameter === 0) return 0.1;
    if (diameter > 0 && diameter <= 50000) return 0.2;
    if (diameter > 50000 && diameter <= 100000) return 0.4;
    if (diameter > 100000 && diameter <= 150000) return 0.6;
    if (diameter > 150000 && diameter <= 200000) return 0.8;
    if (diameter > 200000) return 1.0;
}
function getDiameterPlanet(diameter){
    return diameter / 10000 * 0.5 ;
}
mapData.allPlanets.forEach(planet => {
    const planetCoordinates = [planet.Y, planet.X];
    const planetRegion = planet.region ;
    const planetColor = regionColors[planetRegion];
    const diameter = planet.diameter;
    const radius = getDiameterScale(diameter);

    L.circle(planetCoordinates, {
        color: planetColor,
        fillColor: planetColor,
        radius: radius
    }).addTo(map)
        .bindPopup(`
            <b>Planet:</b> ${planet.name}<br>
            <b>Region</b>: ${planetRegion}<br>
             <b>Diameter: </b> ${diameter}
        `);
});

L.circle(departureCoordinates, {
    color: 'white',
    fillColor: 'white',
    fillOpacity: 0.5,
    radius:getDiameterPlanet(departureDiameter)
}).addTo(map)
    .bindPopup(`
        <b>Departure Planet:</b> ${mapData.departure.name}<br>
        <b>Region:</b> ${mapData.departure.region}<br>
        <b>Diameter: </b> ${departureDiameter}
    `);

L.circle(arrivalCoordinates, {
    color: 'white',
    fillColor: 'white',
    fillOpacity: 0.5,
    radius: getDiameterPlanet(arrivalDiameter) // Le rayon est la moitié du diamètre
}).addTo(map)
    .bindPopup(`
        <b>Arrival Planet:</b> ${mapData.arrival.name}<br>
        <b>Region:</b> ${mapData.arrival.region}<br>
         <b>Diameter:</b> ${arrivalDiameter}
    `);

L.polyline([departureCoordinates, arrivalCoordinates], {
    color: 'white',
    weight: 4
}).addTo(map);

// Ajouter une légende
const legend = L.control({ position: 'bottomright' });

legend.onAdd = function (map) {
    const div = L.DomUtil.create('div', 'info legend');
    const regions = Object.keys(regionColors);

    // Construire la légende avec les couleurs et les noms des régions
    let legendContent = '<h4>Regions</h4>';
    regions.forEach(region => {
        legendContent += `
            <i style="background:${regionColors[region]}"></i> ${region}<br>
        `;
    });

    div.innerHTML = legendContent;
    return div;
};

legend.addTo(map);
