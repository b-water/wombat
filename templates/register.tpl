<img src="images/loginlogo.jpg" width="400" height="325" class="loginlogo" />
<div id="login">
    <form method="post" action="index.php?menu=register">
        {if $error eq TRUE}
            <p class="error">{$errormsg}</p>
        {/if}
        <input type="hidden" id="send" name="send" value="1" />
        <input name="forename" id="forename" type="text" value="{$vorname}" class="label" title="Vorname" />
        <input name="name" id="name" type="text" value="{$nachname}" class="label" title="Nachname" />
        <input name="username" id="username" type="text" value="{$benutzername}" class="label" title="Benutzername" />
        <input name="password" id="password" type="password" value="{$passwort}" class="label" title="Passwort" />
        <input name="password_repeat" id="password_repeat" type="password" value="{$passwort_repeat}" class="label" title="Passwort wiederholen" />
        <input name="email" id="email" type="text" value="{$email}" class="label" title="E-Mail Adresse"/>
        <div class="box">
            <input type="submit" id="register" value="Registrieren" />
            <a id="cancel" href="index.php?=login">Abbruch</a>
        </div>
    </form>
</div>