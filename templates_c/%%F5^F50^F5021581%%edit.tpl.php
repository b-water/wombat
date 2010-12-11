<?php /* Smarty version 2.6.26, created on 2010-12-11 20:48:46
         compiled from movie/edit.tpl */ ?>
<form class="edit" method="POST" action="index.php?controller=movie&action=edit" enctype="multipart/form-data">
    <fieldset>
        <label>Name</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['name']; ?>
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
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['rating']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['description']; ?>
" />
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome right" value="Änderungen speichern" />
    </fieldset>
</form>