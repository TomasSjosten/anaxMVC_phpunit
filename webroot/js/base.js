$(document).ready(function() {

    $('#show_grid').click(function(e) {
        console.log('Yay');
        e.preventDefault();
        $('body').toggleClass('regions');
    });

});