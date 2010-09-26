<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Red Wombat - Digitale Medien Bibliothek</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Autor" content="Nico Schmitz" />
        <meta name="Copyright" content="2010 Nico Schmitz" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.labelify.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
    </head>
    <body>
        <div id="navigation">
            {* Navigations Bereich Laden *}
            {include file='navigation.tpl'}
        </div>
        <div id="container">
            <div id="content">
                {* Content Bereich Laden *}
                {include file='content.tpl'}
            </div>
            <div id="sidebar">
                {* Sidebar Bereich Laden *}
                {include file='sidebar.tpl'}
            </div>
            <div id="footer">
                {* Footer Bereich Laden *}
                {include file='footer.tpl}
            </div>
        </div>
    </body>
</html>