$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxComplete(function (event, xhr, settings) {
    if (xhr.responseJSON) {
        if (xhr.responseJSON.status == "error" && xhr.responseJSON.message == "Session expired.") {
            window.location.replace(routes.auth.logout);
        }
    }
    else if (xhr.status == 401) {
        window.location.replace(routes.home);
    }
});

var routes = {
    "home": "/",
    "auth": {
        "logout": "/auth/logout",
        "agents_logout": "/agents/auth/logout"
    }
};

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.disabled-link').on('click', 'a.disabled', function (event) {
        event.preventDefault();
    });
});
