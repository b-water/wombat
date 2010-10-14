<?php

    /* Konfigurationseinstellungen für das System */



//    $query = 'SELECT * FROM config';
//    $result = $db->query($query);
//
//    while($row = $result->fetch_assoc()) {
//        echo '<pre>';
//        print_r($row);
//        echo '</pre>';
//    }

    $host = 'localhost';        // Host oder IP-Adresse
    $user = 'dbadmin';          // Datenbank User
    $password = '1234';         // Passwort für den User
    $database = 'redwombat';    // Datenbank

    $config = array();

    $config['author'] = 'Nico Schmitz';
    $config['copyright'] = '2010 Nico Schmitz';
    $config['title'] = 'Red Wombat - Die Digitale Medienbibliothek';

?>
