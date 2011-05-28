<?php /* Smarty version Smarty-3.0.6, created on 2011-05-28 14:18:09
         compiled from ".\templates\genre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18284de0e801703c02-01949147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26d878e6913df7c9e9d047097cc5f49c333726a0' => 
    array (
      0 => '.\\templates\\genre.tpl',
      1 => 1306585087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18284de0e801703c02-01949147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="genre" id="genre" class="genre">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('genre')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->getVariable('movie')->value['genre']){?>
            <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }?>
    <?php }} ?>
</select>