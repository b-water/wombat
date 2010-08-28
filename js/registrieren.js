
$(document).ready(function()
{
    // Entfernung des Labels bei den Inputs
    $('#vorname').focus(function() {
          document.getElementById('label.vorname').style.display = 'none';
    });
    // Entfernung des Labels bei den Inputs
    $('#nachname').focus(function() {
          document.getElementById('label.nachname').style.display = 'none';
    });
    // Entfernung des Labels bei den Inputs
    $('#benutzername').focus(function() {
          document.getElementById('label.benutzername').style.display = 'none';
    });

    // Entfernung des Labels bei den Inputs
    $('#passwort').focus(function() {
        document.getElementById('label.passwort').style.display = 'none';
    });
    // Entfernung des Labels bei den Inputs
    $('#passwort_repeat').focus(function() {
        document.getElementById('label.passwort_repeat').style.display = 'none';
    });
    // Entfernung des Labels bei den Inputs
    $('#email').focus(function() {
        document.getElementById('label.email').style.display = 'none';
    });
});
