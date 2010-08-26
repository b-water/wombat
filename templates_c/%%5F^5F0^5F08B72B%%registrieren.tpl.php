<?php /* Smarty version 2.6.26, created on 2010-08-21 18:51:07
         compiled from registrieren.tpl */ ?>
<img src="bilder/loginlogo.jpg" width="400" height="325" class="loginlogo" />
<div id="login">
    <form method="post" action="index.php">
        <div id="label.benutzername" class="absolute"><label class="relative" for="benutzer">Benutzername</label></div>
        <input name="benutzer" id="benutzer" type="text" />
        <div id="label.email" class="absolute"><label class="relative" for="email">E-Mail Adresse</label></div>
        <input name="email" id="email" type="text" />
        <div id="label.passwort" class="absolute"><label class="relative" for="passwort">Passwort</label></div>
        <input name="passwort" id="passwort" type="password" />
        <div id="label.passwort.repeat" class="absolute"><label class="relative" for="passwort.repeat">Passwort wiederholen</label></div>
        <input name="passwort.repeat" id="passwort.repeat" type="password" />
        <div class="right">
            <input type="submit" id="click" value="Absenden" />
            <a href="index.php?menu=anmelden">Abbrechen</a>
        </div>
    </form>
    <div class="clear"></div>
</div>