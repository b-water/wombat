<?php /* Smarty version 2.6.26, created on 2010-12-12 13:01:58
         compiled from movie/edit.tpl */ ?>
<form id="edit" method="POST" action="bootstrap.php?controller=movie&action=update" enctype="multipart/form-data" >
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $this->_tpl_vars['movie']['name']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <select name="format">
            <?php $_from = $this->_tpl_vars['format']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <?php if ($this->_tpl_vars['item']['name'] == $this->_tpl_vars['movie']['format']): ?>
            <option selected="selected"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php else: ?>
            <option><?php echo $this->_tpl_vars['item']['name']; ?>
</option>

                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <select name="genre">
            <?php $_from = $this->_tpl_vars['genre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <?php if ($this->_tpl_vars['item']['name'] == $this->_tpl_vars['movie']['format']): ?>
            <option selected="selected"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php else: ?>
            <option><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </fieldset>
    <fieldset>
        <label>Cover</label>
        <input type="file" name="cover"/>
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'rating.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </fieldset>
    <fieldset>
        <label>Größe</label>
        <input type="text" name="size" value="<?php echo $this->_tpl_vars['movie']['size']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <textarea name="description"><?php echo $this->_tpl_vars['movie']['description']; ?>
</textarea>
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome right" value="Änderungen speichern" />
    </fieldset>
</form>