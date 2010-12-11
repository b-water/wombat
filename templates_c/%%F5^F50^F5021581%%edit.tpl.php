<?php /* Smarty version 2.6.26, created on 2010-12-11 15:57:24
         compiled from movie/edit.tpl */ ?>
<form class="edit" method="POST" action="index.php?controller=movie&action=edit">
    <fieldset>
        <label>Name</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['name']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['format']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['genre']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Cover</label>
        <input type="text" value="<?php echo $this->_tpl_vars['movie']['cover']; ?>
" />
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
    <input type="submit" class="small awesome" value="Änderungen speichern" />
</form>