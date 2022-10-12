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