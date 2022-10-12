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
 var villes = {
     "Paris": { "lat": 48.852969, "lon": 2.349903 },
     "Brest": { "lat": 48.383, "lon": -4.500 },
     "Quimper": { "lat": 48.000, "lon": -4.100 },
     "Bayonne": { "lat": 43.500, "lon": -1.467 }
 };
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
     // Nous parcourons la liste des villes
     for (ville in villes) {
         var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(my_map);
         marker.bindPopup(ville);
     }
     loadout()
 }
 window.addEventListener('load', function() {
     loadin()
         // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
     navigator.geolocation.getCurrentPosition((position) => {
         initMap(position.coords.latitude, position.coords.longitude);
     }, (error) => {
         console.log(error);
         loadout()
     });
 });