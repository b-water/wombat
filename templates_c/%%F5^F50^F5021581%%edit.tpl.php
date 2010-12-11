<?php /* Smarty version 2.6.26, created on 2010-12-11 19:14:20
         compiled from movie/edit.tpl */ ?>
<form class="edit" method="POST" action="index.php?controller=movie&action=edit" enctype="multipart/form-data">
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

        <input type="file" value="Datei" />
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