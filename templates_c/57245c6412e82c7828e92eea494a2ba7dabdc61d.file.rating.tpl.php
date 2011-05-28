<?php /* Smarty version Smarty-3.0.6, created on 2011-05-28 14:18:41
         compiled from ".\templates\rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305574de0e821b03d58-23646088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57245c6412e82c7828e92eea494a2ba7dabdc61d' => 
    array (
      0 => '.\\templates\\rating.tpl',
      1 => 1306585120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305574de0e821b03d58-23646088',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="rating" id="rating" class="rating">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rating')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->getVariable('movie')->value['rating']){?>
            <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }else{ ?>
            <option><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }?>
    <?php }} ?>
</select>