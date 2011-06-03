<?php /* Smarty version Smarty-3.0.6, created on 2011-06-03 13:48:53
         compiled from ".\templates\/movie/edit_actor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24904de8ca25ac44a4-70080951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa15397deb2f0f76ea40e364f06acbb041074ec6' => 
    array (
      0 => '.\\templates\\/movie/edit_actor.tpl',
      1 => 1307101732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24904de8ca25ac44a4-70080951',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<label>Schauspieler</label>
<input type="text" name="autoCompleteGenre" id="autoCompleteGenre"/>
<div id="associatedGenres">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value['genre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <span class="genre">
            <input type="hidden" name="genre[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['genre_id'];?>
" />
            <span class="text"><?php echo $_smarty_tpl->tpl_vars['item']->value['genre'];?>
</span>
            <span class="delete">L&ouml;schen</span>
        </span>
    <?php }} ?>
</div>