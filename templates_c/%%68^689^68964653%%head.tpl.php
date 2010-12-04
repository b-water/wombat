<?php /* Smarty version 2.6.26, created on 2010-12-03 22:51:39
         compiled from head.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=ISO-8859-1"/>
        <title>Red Wombat - <?php echo $this->_tpl_vars['title']; ?>
</title>
        <meta name="Author" content="Nico Schmitz" />
        <meta name="Copyright" content="2010 Nico Schmitz" />
        <?php $_from = $this->_tpl_vars['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['css']):
?>
            <link rel="stylesheet" href="css/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" media="all" />
        <?php endforeach; endif; unset($_from); ?>
    </head>