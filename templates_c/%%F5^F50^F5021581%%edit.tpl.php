<?php /* Smarty version 2.6.26, created on 2010-12-12 13:18:51
         compiled from movie/edit.tpl */ ?>
<form id="edit" method="POST" action="bootstrap.php?controller=movie&action=update" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['movie']['id']; ?>
" />
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $this->_tpl_vars['movie']['name']; ?>
" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'format.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'genre.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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