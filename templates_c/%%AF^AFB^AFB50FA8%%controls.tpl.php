<?php /* Smarty version 2.6.26, created on 2010-11-07 17:03:12
         compiled from controls.tpl */ ?>
<form id="controls" action="index.php?menu=<?php echo $this->_tpl_vars['menu']; ?>
" method="POST">
    <div class="box">
        <input id="add" name="add" type="submit" value="Hinzuf&uuml;gen" />
        <input id="change" name="change" type="submit" value="&Auml;ndern" />
        <input id="del" name="del" type="submit" value="L&ouml;schen" />
        <input id="import" name="import" type="submit" value="Importieren" />
        <input id="export" name="export" type="submit" value="Exportieren" />
    </div>
    <div class="box">
        <p>Nach Name selektieren:</p>
        <input id="searchText" class="ui-widget" name="searchText" type="text" />
        <p>Nach Genre selektieren:</p>
        <select id="genreFilter" name="genreFilter">
            <option></option>
            <?php $_from = $this->_tpl_vars['genres']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['genre']):
?>
                <option value="<?php echo $this->_tpl_vars['genre']; ?>
"><?php echo $this->_tpl_vars['genre']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <p>Nach Format selektieren:</p>
        <select id="formatFilter" name="formatFilter">
                <option></option>
            <?php $_from = $this->_tpl_vars['formats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['format']):
?>
                <option id="<?php echo $this->_tpl_vars['format']; ?>
"><?php echo $this->_tpl_vars['format']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <input id="searchSubmit"  name="searchSubmit"  type="submit" value="Selektieren" />
    </div>
</form>