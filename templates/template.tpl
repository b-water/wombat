<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=ISO-8859-1"/>
        <title>{$title}</title>
        <meta name="Author" content="{$author}" />
        <meta name="Copyright" content="{$copyright}" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.labelify.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
    </head>
    <body>
        <div id="wrapper">
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
        </div>
    </body>
</html>