<img src="bilder/loginlogo.jpg" width="400" height="325" class="loginlogo" />
<div id="anmeldung">
    <form method="post" action="index.php?menu=registrieren">
        {if $error eq TRUE}
            <p class="error">{$errormsg}</p>
        {/if}
        <input type="hidden" id="send" name="send" value="1" />
        <div id="label.vorname" class="absolute"><label class="relative" for="benutzer">Vorname</label></div>
        <input name="vorname" id="vorname" type="text" value="{$vorname}" />
        <div id="label.nachname" class="absolute"><label class="relative" for="benutzer">Nachname</label></div>
        <input name="nachname" id="nachname" type="text" value="{$nachname}" />
        <div id="label.benutzername" class="absolute"><label class="relative" for="benutzer">Benutzername</label></div>
        <input name="benutzername" id="benutzername" type="text" value="{$benutzername}" />
        <div id="label.passwort" class="absolute"><label class="relative" for="passwort">Passwort</label></div>
        <input name="passwort" id="passwort" type="password" value="{$passwort}" />
        <div id="label.passwort_repeat" class="absolute"><label class="relative" for="passwort">Passwort wiederholen</label></div>
        <input name="passwort_repeat" id="passwort_repeat" type="password" value="{$passwort_repeat}" />
        <div id="label.email" class="absolute"><label class="relative" for="passwort">E-Mail Adresse</label></div>
        <input name="email" id="email" type="text" value="{$email}" />
        <div class="box">
            <input type="submit" id="registrieren" value="Registrieren" />
            <a id="abbruch" href="index.php?=anmelden">Abbruch</a>
        </div>
    </form>
</div>
