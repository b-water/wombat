
$(document).ready(function()
{
    // Entfernung des Labels bei den Inputs
    $('input#benutzer', '').focus(function() {
        document.getElementById('label.benutzername').style.display = 'none';
    });
    // Entfernung des Labels bei den Inputs
    $('input#passwort').focus(function() {
        document.getElementById('label.passwort').style.display = 'none';
    });

});
