<?php /* Smarty version Smarty-3.0.6, created on 2011-07-29 23:57:46
         compiled from "./templates/dflt_paginator_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15463725454e332cdad81404-05410488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76246389530bfc3ac44b7b9afa8a2f044a549261' => 
    array (
      0 => './templates/dflt_paginator_control.tpl',
      1 => 1311974561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15463725454e332cdad81404-05410488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="dflt_paginator_control">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
<?php }} ?>
</ul>
