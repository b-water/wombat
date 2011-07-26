<?php /* Smarty version Smarty-3.0.6, created on 2011-07-25 20:41:12
         compiled from "./templates//movie/edit_format.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8513628724e2db8c8ac6fd0-83495028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b373c9dcfba2f529ff32b4c2730a3da18b0f4e0b' => 
    array (
      0 => './templates//movie/edit_format.tpl',
      1 => 1311470558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8513628724e2db8c8ac6fd0-83495028',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="format" id="format" class="format">
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