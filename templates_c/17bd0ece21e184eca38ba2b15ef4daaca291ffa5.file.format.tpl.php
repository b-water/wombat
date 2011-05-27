<?php /* Smarty version Smarty-3.0.6, created on 2011-05-27 20:37:56
         compiled from ".\templates\format.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170274ddfef84dbe5a5-33912738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17bd0ece21e184eca38ba2b15ef4daaca291ffa5' => 
    array (
      0 => '.\\templates\\format.tpl',
      1 => 1301683721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170274ddfef84dbe5a5-33912738',
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
        <?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->getVariable('movie')->value['format']){?>
            <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }?>
    <?php }} ?>
</select>