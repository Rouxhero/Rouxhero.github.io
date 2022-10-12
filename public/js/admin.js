function getLocation() {
    loadin()
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    navigator.geolocation.getCurrentPosition((position) => {
        $('#lat').val(position.coords.latitude)
        $('#lng').val(position.coords.longitude)
        loadout();
    });
}