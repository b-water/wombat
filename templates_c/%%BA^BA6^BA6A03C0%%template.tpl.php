<?php /* Smarty version 2.6.26, created on 2010-08-28 21:50:28
         compiled from template.tpl */ ?>
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
        <link rel="stylesheet" href="css/registrieren.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/jquery.tablesorter.pager.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="js/jquery.metadata.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
        <script type="text/javascript" src="js/anmeldung.js"></script>
        <script type="text/javascript" src="js/registrieren.js"></script>
    </head>
    <body>
        <?php if ($this->_tpl_vars['registrieren'] == TRUE): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'registrieren.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
            <p><?php echo $this->_tpl_vars['anmeldung']; ?>
</p>
            <?php if ($this->_tpl_vars['anmeldung'] == FALSE): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'anmeldung.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
                <div id="navigation">
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'navigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <div id="header">
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <div id="container">
                    <div id="content">
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'content.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div id="sidebar">
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div id="footer">
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </body>
</html>