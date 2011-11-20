<?php /* Smarty version Smarty-3.0.6, created on 2011-08-20 22:35:33
         compiled from ".\templates\/movie/edit_genre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22564e501a952d4000-24764308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d429b1810c2812a6f5b33f11dc2a020ae9f539a' => 
    array (
      0 => '.\\templates\\/movie/edit_genre.tpl',
      1 => 1313872465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22564e501a952d4000-24764308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<label for="autocompleteGenre">Genre</label>
<div class="input">
    <input type="text" name="autocompleteGenre" class="xlarge" id="autocompleteGenre"/>
    <span class="help-inline"><button type="button" class="btn addGenreToken">Hinzufügen</button></span>
</div>
</div>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value->getGenre(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <div class="clearfix success">
        <div class="input">
            <input type="text" disabled="disabled" class="xlarge" value="<?php echo $_smarty_tpl->getVariable('item')->value->getName();?>
" />
        </div>
    </div>
<?php }} ?>