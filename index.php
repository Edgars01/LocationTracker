<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    </head>

    <body>
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </body>

</html>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>

    let map = L.map('map').setView([39.739235, -104.990250], 12);
    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' });
    osm.addTo(map);
    if (navigator.geolocation)  setInterval(() => { navigator.geolocation.getCurrentPosition(getPosition) }, 1000);

    let marker, circle;

    function getPosition(position)
    {
        let latitude = position.coords.latitude
        let longitude = position.coords.longitude
        let accuracy = position.coords.accuracy
        if(marker) map.removeLayer(marker);
        if(circle) map.removeLayer(circle);
        marker = L.marker([latitude, longitude])
        circle = L.circle([latitude, longitude], {radius: accuracy})
        let featureGroup = L.featureGroup([marker, circle]).addTo(map)
        map.fitBounds(featureGroup.getBounds())
        console.log("Latitude: "+ latitude +" Longitude: "+ longitude+ " Accuracy: "+ accuracy)
    }

</script>