$(document).ready(function () {
    function toggleSidebar() {
        // $('#sidebarToggleTop').click();
        $('#accordionSidebar').addClass('ocultarBarra'); // Agrega o remueve la clase 'toggled'
    }
    if ($(window).width() <= 767) {
        toggleSidebar();
        console.log("window <= 767px");
    }
    $('#sidebarToggleTop').click(function() {
        $('#accordionSidebar').toggleClass('ocultarBarra'); // Agrega o remueve la clase 'toggled'
        // $('#accordionSidebar').remueve('toggled'); 
    });
    $(window).resize(function() {
        if ($(window).width() <= 767) {
            toggleSidebar();
            console.log("window <= 767px");
        }
    });

});