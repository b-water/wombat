<?php /* Smarty version 2.6.26, created on 2010-04-01 12:31:45
         compiled from smarty.tpl */ ?>

Hallo <?php echo $this->_tpl_vars['name']; ?>
, herzlich Willkommen!

<ul>
    <?php $_from = $this->_tpl_vars['name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['schluessel'] => $this->_tpl_vars['wert']):
?>
    <li><?php echo $this->_tpl_vars['schluessel']; ?>
 : <?php echo $this->_tpl_vars['wert']; ?>
</li>
    <?php endforeach; endif; unset($_from); ?> 
</ul>