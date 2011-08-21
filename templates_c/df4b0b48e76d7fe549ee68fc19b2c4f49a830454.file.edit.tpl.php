<?php /* Smarty version Smarty-3.0.6, created on 2011-08-21 23:01:06
         compiled from ".\templates\movie/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:223684e517212a917d8-54701200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df4b0b48e76d7fe549ee68fc19b2c4f49a830454' => 
    array (
      0 => '.\\templates\\movie/edit.tpl',
      1 => 1313960456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223684e517212a917d8-54701200',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-header">
    <h1>Film <small>Bearbeiten</small></h1>
</div>
<form id="edit" method="POST" action="movie/edit/update/id/<?php echo $_smarty_tpl->getVariable('movie')->value->getId();?>
/" enctype="multipart/form-data" >
    <input id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getId();?>
" type="hidden" />
    <div class="alert-message success none">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div class="clearfix">
        <div class="input">
            <img src="<?php echo $_smarty_tpl->getVariable('movie')->value->getImage();?>
" alt="Aktuelles Bild" />
        </div>
    </div>
    <div class="clearfix">
        <label for="title">Titel</label>
        <div class="input">
            <input type="text" class="xxlarge" name="title" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getTitle();?>
" />
        </div>
    </div>
    <div class="clearfix">
        <label for="image">Bild</label>
        <div class="input">
            <input type="file" class="xxlarge" name="image" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getImage();?>
" />
        </div>
    </div>
    <div class="clearfix">
        <label for="format">Format</label>
        <div class="input">
            <select name="format" id="format" class="format xxlarge">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('format')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                    <?php if ($_smarty_tpl->getVariable('item')->value->getName()==$_smarty_tpl->getVariable('movie')->value->getFormat()){?>
                        <option value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
" selected="selected"><?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
</option>
                    <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
</option>
                    <?php }?>
                <?php }} ?>
            </select>
        </div>
    </div>
    <div class="clearfix">
        <label for="rating">Bewertung</label>
        <div class="input">
            <select name="rating" id="rating" class="xxlarge">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rating')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                    <?php if ($_smarty_tpl->getVariable('item')->value->getName()==$_smarty_tpl->getVariable('movie')->value->getRating()){?>
                        <option value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
" selected="selected"><?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
</option>
                    <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
</option>
                    <?php }?>
                <?php }} ?>
            </select>
        </div>
    </div>
    <div class="clearfix">
        <label for="duration">Länge</label>
        <div class="input">
            <input type="text" name="duration" id="duration" class="xxlarge" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getDuration();?>
" />
            <span class="help-inline">in Minuten</span>
        </div>
    </div>
    <div class="clearfix">
        <label for="year">Jahr</label>
        <div class="input">
            <input type="text" name="year" id="year" class="xxlarge" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getYear();?>
" />
        </div>
    </div>
    <div class="clearfix">
        <label for="trailer">Trailer</label>
        <div class="input">
            <input type="text" name="trailer" id="trailer" class="xxlarge" value="<?php echo $_smarty_tpl->getVariable('movie')->value->getTrailer();?>
" />
        </div>
    </div>
    <div class="clearfix">
        <label for="description">Beschreibung</label>
        <div class="input">
            <textarea id="description" class="xxlarge" name="description"><?php echo $_smarty_tpl->getVariable('movie')->value->getDescription();?>
</textarea>
        </div>
    </div>
    <div class="clearfix">
        <label for="autocompleteGenre">Genre</label>
        <div class="input">
            <input type="text" name="genre" class="xxlarge" id="genre"/>
            <span class="help-inline"><button type="button" class="btn addGenreToken">Hinzufügen</button></span>
        </div>
    </div>
    <div class="clearfix">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value->getGenre(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
            <div class="input">
                <input type="text" disabled="disabled" class="xxlarge" value="<?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
" />
            </div>
        <?php }} ?>
    </div>
    <div class="clearfix">
        <label for="artist">Schauspieler</label>
        <div class="input">
            <input type="text" name="artist" id="artist" class="xxlarge"/>
            <span class="help-inline"><button class="btn">Hinzufügen</button></span>
        </div>
        <div id="assocArtist">
        </div>
    </div>
    <div class="clearfix">
        <button class="btn primary" type="submit">Speichern</button>
        <button class="btn" type="reset">Zurücksetzen</button>
        <a href="movie/" class="btn">Abbrechen</a>
    </div>
</form>