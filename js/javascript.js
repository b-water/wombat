
$(document).ready(function()
{
    $("#filme").tablesorter({
        widthFixed: true, widgets: ['zebra']})
        .tablesorterPager({
            container: $("#navigation")
        });

    $('#click').click(function() {
        $('#wrapper').fadeOut('slow', function() {
        });
    });

    // Entfernung des Labels auf der Login Seite bei den Inputs
    $('input#benutzer').click(function() {
        document.getElementById('label.benutzername').style.display = 'none';
    });
    // Entfernung des Labels auf der Login Seite bei den Inputs
    $('input#passwort').click(function() {
        document.getElementById('label.passwort').style.display = 'none';
    });

});




