const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -2
});

const bounds = [[0, 0], [1000, 1000]];

map.fitBounds(bounds);

const departureMarker = L.marker(mapData.departure.coordinates).addTo(map)
    .bindPopup(`<b>Departure Planet:</b> ${mapData.departure.name}
                    Region: ${mapData.departure.region}`,);
const arrivalMarker = L.marker(mapData.arrival.coordinates).addTo(map)
    .bindPopup(`<b>Arrival Planet:</b> ${mapData.arrival.name}
                Region: ${mapData.arrival.region}`);

const polyline = L.polyline([mapData.departure.coordinates, mapData.arrival.coordinates], {
    color: 'red',
    weight: 2
}).addTo(map);
