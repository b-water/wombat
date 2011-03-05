<?php /* Smarty version 2.6.26, created on 2011-03-05 22:16:56
         compiled from menu.tpl */ ?>
<ul id="menu">
    <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <?php if ($this->_tpl_vars['item']['layer'] == '1'): ?>
            <li class="parent">
                <a href="<?php echo $this->_tpl_vars['item']['url']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
            </li>
        <?php else: ?>
            <li class="child">
                <a href="<?php echo $this->_tpl_vars['item']['url']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
            </li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</ul>