<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Red Wombat - Digitale Medien Bibliothek</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Autor" content="Nico Schmitz" />
        <meta name="Copyright" content="2010 Nico Schmitz" />
        <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/sidebar.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/content.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/header.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/anmeldung.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/navigation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/jquery.tablesorter.pager.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="js/jquery.metadata.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
        <script type="text/javascript" src="js/anmeldung.js"></script>
    </head>
    <body>
        {if $registrieren eq TRUE}
            {include file='registrieren.tpl'}
        {else}
            {if $anmeldung eq FALSE}
                {include file='anmeldung.tpl'}
            {else}
                <div id="navigation">
                    {* Navigations Bereich Laden *}
                    {include file='navigation.tpl'}
                </div>
                <div id="header">
                    {* Header Bereich Laden *}
                    {include file='header.tpl}
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
            {/if}
        {/if}
    </body>
</html>