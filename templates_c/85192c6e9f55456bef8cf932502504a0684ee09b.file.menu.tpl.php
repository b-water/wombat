<?php /* Smarty version Smarty-3.0.6, created on 2011-05-27 20:37:15
         compiled from ".\templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198544ddfef5b659318-01696412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85192c6e9f55456bef8cf932502504a0684ee09b' => 
    array (
      0 => '.\\templates\\menu.tpl',
      1 => 1306435859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198544ddfef5b659318-01696412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul id="menu">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menuitems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <li class="<?php echo $_smarty_tpl->tpl_vars['item']->value['liclass'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['item']->value['aclass'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
    <?php }} ?>
</ul>