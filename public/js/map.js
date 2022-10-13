 // On initialise la latitude et la longitude de Paris (centre de la carte)
 // Nous initialisons une liste de marqueurs
 var lat = 0;
 var lon = 0;

 function getLatLon(position) {
     lat = position.coords.latitude;
     lon = position.coords.longitude;
     document.getElementById('lon').value = lon;
     document.getElementById('lat').value = lat
 }


 var my_map = null;

 // Fonction d'initialisation de la carte
 function initMap(lat, lon) {

     console.log(lat, lon)
         // Créer l'objet "my_map" et l'add dans l'élément HTML qui a l'ID "map"
     my_map = L.map('map', 4).setView([lat, lon], 11);
     L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
         // Il est toujours bien de laisser le lien vers la source des données
         attribution: 'données © OpenStreetMap/ODbL - rendu OSM France',
         minZoom: 1,
         maxZoom: 20,
     }).addTo(my_map);
     $.ajax({
         url: "/ajax/getMarker",
         "type": "POST",
         success: function(data) {
             data = JSON.parse(data);
             console.log(data)
             data.forEach(element => {
                 console.log(element)
                 var marker = L.marker([element.lat, element.lon]).addTo(my_map);
                 marker.bindPopup(element.name);
             });
             loadout()
         }
     })

 }
 window.addEventListener('load', function() {
     loadin()
         // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
     navigator.geolocation.getCurrentPosition((position) => {
         initMap(position.coords.latitude, position.coords.longitude);
     }, (error) => {
         console.log(error);
         $('#debug').val(error)
         loadout()
     });
 });