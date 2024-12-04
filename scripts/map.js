const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -2
});

const bounds = [[0, 0], [1000, 1000]];
map.fitBounds(bounds);

// Couleurs associées aux régions
const regionColors = {
    "Region 1": "red",
    "Region 2": "blue",
    "Region 3": "green",
    "Region 4": "orange",
    "default": "gray" // Couleur par défaut si la région est inconnue
};
const departureCoordinates = mapData.departure.coordinates;
const arrivalCoordinates = mapData.arrival.coordinates;
const departureDiameter = mapData.departure.diameter;
const arrivalDiameter = mapData.arrival.diameter;

// Obtenir les couleurs des régions
const departureColor = regionColors[mapData.departure.region] || regionColors.default;
const arrivalColor = regionColors[mapData.arrival.region] || regionColors.default;

L.marker(mapData.departure.coordinates).addTo(map)
    .bindPopup(`
        <b>Departure Planet:</b> ${mapData.departure.name}<br>
        Region: ${mapData.departure.region}<br>
        Diameter: ${departureDiameter} km
    `);

L.marker(mapData.arrival.coordinates).addTo(map)
    .bindPopup(`
        <b>Arrival Planet:</b> ${mapData.arrival.name}<br>
        Region: ${mapData.arrival.region}<br>
        Diameter: ${arrivalDiameter} km
    `);

// Ajouter une ligne entre la planète de départ et d'arrivée
L.polyline([departureCoordinates, arrivalCoordinates], {
    color: 'red',
    weight: 2
}).addTo(map);
