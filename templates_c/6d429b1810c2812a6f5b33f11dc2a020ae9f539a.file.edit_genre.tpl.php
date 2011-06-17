<?php /* Smarty version Smarty-3.0.6, created on 2011-06-17 20:45:53
         compiled from ".\templates\/movie/edit_genre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226214dfba0e152c375-08402241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d429b1810c2812a6f5b33f11dc2a020ae9f539a' => 
    array (
      0 => '.\\templates\\/movie/edit_genre.tpl',
      1 => 1308336351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226214dfba0e152c375-08402241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--<label>Genre</label>
<input type="text" name="autoCompleteGenre" id="autoCompleteGenre"/>
<div id="associatedGenres">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value['genre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <span class="genre">
            <input type="hidden" name="genre[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
            <span class="text"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
            <span class="delete">L&ouml;schen</span>
        </span>
    <?php }} ?>
</div>-->