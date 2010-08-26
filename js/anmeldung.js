
$(document).ready(function()
{
    // Entfernung des Labels bei den Inputs
    $('#benutzername').focus(function() {
          document.getElementById('label.benutzername').style.display = 'none';
    });
    // Einfügen des Labels bei den Inputs
//    $('input#benutzer').focusout(function() {
//        document.getElementById('label.benutzername').style.display = 'block';
//    });

    // Entfernung des Labels bei den Inputs
    $('#passwort').focus(function() {
        document.getElementById('label.passwort').style.display = 'none';
    });
    // Einfügen des Labels bei den Inputs
//    $('#passwort').focusout(function() {
//        document.getElementById('label.passwort').style.display = 'block';
//    });

});
