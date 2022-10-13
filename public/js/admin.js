function getLocation() {
    loadin()
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    navigator.geolocation.getCurrentPosition((position) => {
        $('#lat').val(position.coords.latitude)
        $('#lng').val(position.coords.longitude)
        loadout();
    });
}

function addM() {
    loadin();
    var lng = $('#lng').val()
    var lat = $('#lat').val()
    var name = $('#name').val()
    var code = $('#code').val()
    if (code == "" || name == "" || lat == "" || lng == "") {
        alert("Please fill all fields !")
        return false
    }
    $.ajax({
        url: "/ajax/addm",
        type: "POST",
        data: {
            lng: lng,
            lat: lat,
            name: name,
            code: code
        },
        success: function(data) {
            loadout()
            $('#lng').val("")
            $('#lat').val("")
            $('#name').val("")
            $('#code').val("")
        }
    })
}