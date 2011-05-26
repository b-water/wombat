<?php /* Smarty version 2.6.26, created on 2011-05-26 20:51:01
         compiled from menu.tpl */ ?>
<ul id="menu">
    <?php $_from = $this->_tpl_vars['menuitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <li class="<?php echo $this->_tpl_vars['item']['liclass']; ?>
"><a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" class="<?php echo $this->_tpl_vars['item']['aclass']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
    <?php endforeach; endif; unset($_from); ?>
</ul>