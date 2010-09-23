<?php


// Überprüfen ob das Formular abgesendet wurde
if(array_key_exists('send', $_REQUEST))
{

    // Pflichtfeldprüfung
    $pflichtfelder = array('vorname', 'nachname','benutzername','passwort','passwort_repeat','email');
    $error = Pflichtfeldpruefung($_REQUEST, $pflichtfelder);

    // Wenn die Pflichtfeldprüfung einen fehler fand wird die Error Nachricht generiert
    if(isset($error) && $error === TRUE)
    {
        $error_msg = 'Bitte füllen Sie alle Felder aus!';

    }
    else
    {
        // Überprüfunge ob die Passwörter überein stimmen
        if($_REQUEST['passwort'] != $_REQUEST['passwort_repeat'])
        {
            $error_msg = 'Die Passwörter überstimmen nicht ein!';
            $error = TRUE;
        }
    }

    // Error Nachricht wird an das Template übergeben
    if(isset($errormsg))
    {
        $smarty->assign('error',$error);
        $smarty->assign('errormsg',$errormsg);
    }

    /* Falls ein Fehler auftritt werden die Felder des Forms mit den vorher
    eingegeben Daten gefüttert */
    if($error === TRUE)
    {
        $smarty->assign('vorname',$_REQUEST['vorname']);
        $smarty->assign('nachname',$_REQUEST['nachname']);
        $smarty->assign('benutzername',$_REQUEST['benutzername']);
        $smarty->assign('passwort',$_REQUEST['passwort']);
        $smarty->assign('passwort_repeat',$_REQUEST['passwort_repeat']);
        $smarty->assign('email',$_REQUEST['email']);
    }

    if(!isset($error))
    {


        $sql = 'INSERT INTO benutzer (vorname,nachname,benutzername,passwort,email)
                VALUES("'.$_REQUEST['vorname'].'","'.$_REQUEST['nachname'].'",
                "'.$_REQUEST['benutzername'].'","'.$_REQUEST['passwort'].'",
                "'.$_REQUEST['email'].'")';
        $db->query($sql);
    }
}





?>
