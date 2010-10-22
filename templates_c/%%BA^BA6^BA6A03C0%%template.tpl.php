<?php /* Smarty version 2.6.26, created on 2010-10-21 22:31:47
         compiled from template.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=ISO-8859-1"/>
        <title><?php echo $this->_tpl_vars['title']; ?>
</title>
        <meta name="Author" content="<?php echo $this->_tpl_vars['author']; ?>
" />
        <meta name="Copyright" content="<?php echo $this->_tpl_vars['copyright']; ?>
" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/jquery.fancybox-1.3.2.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing-1.3.pack.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox-1.3.2.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox-1.3.2.pack.js"></script>
        <script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="js/jquery.labelify.js"></script>
        <script type="text/javascript" src="js/template.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="navigation">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'navigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div id="container">
                <div id="sidebar">
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <div id="content">
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'content.tpl', 'smarty_include_vars' => array()));
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
        </div>
    </body>
</html>