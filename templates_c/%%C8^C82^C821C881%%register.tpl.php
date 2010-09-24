<?php /* Smarty version 2.6.26, created on 2010-09-24 23:20:46
         compiled from register.tpl */ ?>
<img src="images/loginlogo.jpg" width="400" height="325" class="loginlogo" />
<div id="login">
    <form method="post" action="index.php?menu=register">
        <?php if ($this->_tpl_vars['error'] == TRUE): ?>
            <p class="error"><?php echo $this->_tpl_vars['errormsg']; ?>
</p>
        <?php endif; ?>
        <input type="hidden" id="send" name="send" value="1" />
        <input name="forename" id="forename" type="text" value="<?php echo $this->_tpl_vars['vorname']; ?>
" class="label" title="Vorname" />
        <input name="name" id="name" type="text" value="<?php echo $this->_tpl_vars['nachname']; ?>
" class="label" title="Nachname" />
        <input name="username" id="username" type="text" value="<?php echo $this->_tpl_vars['benutzername']; ?>
" class="label" title="Benutzername" />
        <input name="password" id="password" type="password" value="<?php echo $this->_tpl_vars['passwort']; ?>
" class="label" title="Passwort" />
        <input name="password_repeat" id="password_repeat" type="password" value="<?php echo $this->_tpl_vars['passwort_repeat']; ?>
" class="label" title="Passwort wiederholen" />
        <input name="email" id="email" type="text" value="<?php echo $this->_tpl_vars['email']; ?>
" class="label" title="E-Mail Adresse"/>
        <div class="box">
            <input type="submit" id="register" value="Registrieren" />
            <a id="abbruch" href="index.php?=login">Abbruch</a>
        </div>
    </form>
</div>