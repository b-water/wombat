<?php /* Smarty version 2.6.26, created on 2010-10-02 23:47:05
         compiled from login.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><?php echo $this->_tpl_vars['title']; ?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Author" content="<?php echo $this->_tpl_vars['author']; ?>
" />
        <meta name="Copyright" content="<?php echo $this->_tpl_vars['copyright']; ?>
" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.labelify.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
    </head>
    <body>
        <img src="images/loginlogo.jpg" width="400" height="325" class="loginlogo" />
        <div id="login">
            <form method="post" action="index.php?menu=homepage">
                <input name="username" id="username" type="text" class="label" title="Benutzername"  />
                <input name="password" id="password" type="password" class="label" title="Passwort" />
                <div class="box">
                    <input type="submit" id="login" value="Anmelden" />
                </div>
            </form>
        </div>
    </body>
</html>