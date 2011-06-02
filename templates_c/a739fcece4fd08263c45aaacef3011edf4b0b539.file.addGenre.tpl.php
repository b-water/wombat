<?php /* Smarty version Smarty-3.0.6, created on 2011-06-02 20:02:23
         compiled from ".\templates\addGenre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8584de7d02f9cdf68-32248661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a739fcece4fd08263c45aaacef3011edf4b0b539' => 
    array (
      0 => '.\\templates\\addGenre.tpl',
      1 => 1307037693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8584de7d02f9cdf68-32248661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="addGenre" id="addGenre">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('genre')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
    <?php }} ?>
</select>
<input type="button" class="awesome small" id="submit-addGenre" value="Hinzufügen" />