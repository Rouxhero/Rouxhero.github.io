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

 function getStyle(color) {
     return `
    background-color: ${color};
    width: 2rem;
    height: 2rem;
    display: block;
    left: -1.5rem;
    top: -1.5rem;
    position: relative;
    border-radius: 3rem 3rem 0;
    transform: rotate(45deg);
    border: 1px solid #FFFFFF`
 }

 function initMap(lat, lon) {
     $('#loading-info').html("Set up Map")
     console.log(lat, lon)
         // Créer l'objet "my_map" et l'add dans l'élément HTML qui a l'ID "map"
     my_map = L.map('map', 4).setView([lat, lon], 11);
     L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
         // Il est toujours bien de laisser le lien vers la source des données
         attribution: 'données © OpenStreetMap/ODbL - rendu OSM France',
         minZoom: 1,
         maxZoom: 20,
     }).addTo(my_map);
     $('#map').hide()
     $('#loading-info').html("Get Markers")
     $.ajax({
         url: "/ajax/getMarker",
         "type": "POST",
         success: function(data) {
             data = JSON.parse(data);
             console.log(data)

             $('#loading-info').html("Set up Markers")
             data.forEach(element => {
                 let state = JSON.parse(element.state)
                 let myCustomColour = '#583470'
                 let myImages = "ok.svg"
                 console.log(state)
                 switch (state.state) {
                     case '0':
                     case 0:
                         myCustomColour = ' #53d956';
                         myImages = "ok.svg"
                         break
                     case '1':
                     case 1:
                         myCustomColour = '#FFA500';
                         myImages = "notok.svg"
                         break
                     case '2':
                     case 2:
                         myCustomColour = '#c42323';
                         myImages = "dead.svg"
                         break
                 }

                 const icon = L.divIcon({
                     className: "my-custom-pin",
                     iconAnchor: [0, 24],
                     labelAnchor: [-6, 0],
                     popupAnchor: [0, -36],
                     html: `<span style="${getStyle(myCustomColour)}"><img src="/images/${myImages}" style="width: 1.75rem;height: 1.75rem;transform: rotate(-45deg);"/></span>`
                 })
                 console.log(element)
                 var marker = L.marker([element.lat, element.lon], {
                     icon: icon
                 }).addTo(my_map);
                 marker.bindPopup(createEleement(element, myImages));
                 marker
             });
             loadout()
             my_map.setZoom(17)
             $('#map').show()
         },
         error: function(err) {
             loadout()
             console.log(err)
         }
     })

 }

 function createEleement(element, myImages) {
     let state = JSON.parse(element.state)
     let coffee_color, Bcoffee_color, choco_color, soupe_color
     switch (state.product.coffee.state) {
         case '0':
         case 0:
             coffee_color = '#67b790e8';
             break
         case '1':
         case 1:
             coffee_color = '#FFA500e8';
             break
         case '2':
         case 2:
             coffee_color = '#c42323e8';
             break
     }
     switch (state.product.coffeeB.state) {
         case '0':
         case 0:
             Bcoffee_color = '#67b790e8';
             break
         case '1':
         case 1:
             Bcoffee_color = '#FFA500e8';
             break
         case '2':
         case 2:
             Bcoffee_color = '#c42323e8';
             break
     }
     switch (state.product.Chocolate.state) {
         case '0':
         case 0:
             choco_color = '#67b790e8';
             break
         case '1':
         case 1:
             choco_color = '#FFA500e8';
             break
         case '2':
         case 2:
             choco_color = '#c42323e8';
             break
     }
     switch (state.product.Soupe.state) {
         case '0':
         case 0:
             soupe_color = '#67b790e8';
             break
         case '1':
         case 1:
             soupe_color = '#FFA500e8';
             break
         case '2':
         case 2:
             soupe_color = '#c42323e8';
             break
     }
     var text = `
    <div>
        <h3 class="flex"><span class="pt-1">${element.name}</span><img src="/images/${myImages}" style="width: 1.75rem;height: 1.75rem;"/></h3>
        <br/>
        <table>
        <tbody>
        <tr>
        <td class="rounded-lg bg-[${coffee_color}] px-[2px] text-center w-[8rem] h-[3rem] " role="button" onclick="switchPanel('coffee')">
        <b>Café</b>
        </td>
        <td class="rounded-lg bg-[${Bcoffee_color}] px-[2px] text-center w-[8rem] h-[3rem] " role="button" onclick="switchPanel('baseCoffee')">
        <b  >Base Café</b>
        </td>
        </tr>
        <tr>
        <td class="rounded-lg bg-[${choco_color}] px-[2px] text-center w-[8rem] h-[3rem] " role="button" onclick="switchPanel('choco')">
        <b >Chocolat</b>
        </td>
        <td class="rounded-lg bg-[${soupe_color}] px-[2px] text-center w-[8rem] h-[3rem] " role="button" onclick="switchPanel('soupe')">
        <b >Soupe</b>
        </td>
        </tr>
        </tbody>
        </table>
        <br/>
        <a href=" https://www.google.fr/maps/dir//'${element.lat},${element.lon}'/@${element.lat},${element.lon},19z" target="_blank">Open in Google Maps</a>
        <br/>
        <button onclick="updateElement(this)"  data-id="${element.id}" >Update Statut</button>
        </div>    
    `
     return text
 }

 function updateElement(elem) {
     loadin()
     $('#map').hide()
     $.ajax({
         url: "/ajax/updateMachine",
         "type": "POST",
         data: {
             id: $(elem).data('id')
         },
         success: function(data) {
             $('#modal_title').html("Update Machine")
             $('#modal-body').html(data)
             openModal()
             $('#close-modal').hide()
             loadout()
         }
     })
 }
 window.addEventListener('load', function() {
     loadin()
     $('#loading-info').html("Get Location")
         // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
     navigator.geolocation.getCurrentPosition((position) => {

         initMap(position.coords.latitude, position.coords.longitude);
     }, (error) => {
         console.log(error);

         loadout()
     });
 });