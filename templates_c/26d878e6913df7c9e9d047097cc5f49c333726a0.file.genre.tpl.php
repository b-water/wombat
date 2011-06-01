<?php /* Smarty version Smarty-3.0.6, created on 2011-06-01 22:03:45
         compiled from ".\templates\genre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269534de69b218ff866-98175022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26d878e6913df7c9e9d047097cc5f49c333726a0' => 
    array (
      0 => '.\\templates\\genre.tpl',
      1 => 1306958620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269534de69b218ff866-98175022',
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
        <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->getVariable('movie')->value['genre']){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php }?>
    <?php }} ?>
</select>