
function vorbelegung(id)
{
    $('#'+id).focus(function() {
          document.getElementById('label.'+id).style.display = 'none';
    });
}


$(document).ready(function()
{
    // Entfernung des Labels bei den Inputs
    $('#benutzername').focus(function() {
          document.getElementById('label.benutzername').style.display = 'none';
    });

    // Entfernung des Labels bei den Inputs
    $('#passwort').focus(function() {
        document.getElementById('label.passwort').style.display = 'none';
    });
});
