<?php /* Smarty version 2.6.26, created on 2011-05-16 19:52:25
         compiled from format.tpl */ ?>
<select name="format" id="format" class="format">
    <?php $_from = $this->_tpl_vars['format']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <?php if ($this->_tpl_vars['item']['name'] == $this->_tpl_vars['movie']['format']): ?>
            <option selected="selected"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
        <?php else: ?>
            <option value="<?php echo $this->_tpl_vars['item']['name']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</select>