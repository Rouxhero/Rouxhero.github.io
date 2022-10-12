import './bootstrap';

import Alpine from 'alpinejs';


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})



window.Alpine = Alpine;

Alpine.start();