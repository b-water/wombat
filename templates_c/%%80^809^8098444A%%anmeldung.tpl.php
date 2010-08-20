<?php /* Smarty version 2.6.26, created on 2010-08-20 20:30:39
         compiled from anmeldung.tpl */ ?>
<img src="bilder/loginlogo.jpg" width="400" height="325" class="loginlogo" />
<div id="login">
    <form method="post" action="index.php">
        <div id="label.benutzername" class="absolute"><label class="relative" for="benutzer">Benutzername</label></div>
        <input name="benutzer" id="benutzer" type="text" />
        <div id="label.passwort" class="absolute"><label class="relative" for="passwort">Passwort</label></div>
        <input name="passwort" id="passwort" type="password" />
        <div class="right">
            <input type="submit" id="anmelden" value="Anmelden" />
            <a id="registrieren" href="index.php?menu=registrieren">Registrieren</a>
        </div>
    </form>
    <div class="clear"></div>
</div>