function GitPull() {
    loadin()
    $.ajax({
        url: "/ajax/gitpull",
        type: "POST",
        success: function(data) {
            loadout()
            console.log(data)
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}

function SaveDB() {
    loadin()
    $.ajax({
        url: "/ajax/savedb",
        type: "POST",
        success: function(data) {
            loadout()
            console.log(data)
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}

function freshDB() {
    loadin()
    $.ajax({
        url: "/ajax/freshdb",
        type: "POST",
        success: function(data) {
            loadout()
            console.log(data)
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}

function cacheDG() {
    loadin()
    $.ajax({
        url: "/ajax/cache",
        type: "POST",
        success: function(data) {
            loadout()
            console.log(data)
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}

function editUser(userData) {
    loadin()
    console.log(userData)
    $.ajax({
        url: "/ajax/edituser",
        type: "POST",
        data: {
            "name": userData[0],
            "email": userData[1],
            "right": userData[2]
        },
        success: function(data) {
            loadout()
            $('#modal_title').html('Edit User')
            $('#modal-body').html(data)
            openModal()
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}

function updateUser() {
    loadin()
    var name = $('#name').val()
    var right = $('#right').val()
    var email = $('#email').val()
    $.ajax({
        url: "/ajax/saveUser",
        type: "POST",
        data: {
            "name": name,
            "email": email,
            "right": right
        },
        success: function(data) {
            loadout()
            closeModal()
        },
        error: function(data) {
            alert("Error AJAX")
            loadout()
        }
    })
}