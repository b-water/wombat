<?php /* Smarty version Smarty-3.0.6, created on 2011-07-31 19:22:22
         compiled from "./templates/navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21473050864e358f4e688657-56299049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbacb9510296a25cbfcc9aec826eb79a065dc6af' => 
    array (
      0 => './templates/navigation.tpl',
      1 => 1312132940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21473050864e358f4e688657-56299049',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul id="navigation">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navigation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['url']==$_smarty_tpl->getVariable('activ')->value){?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="awesome red medium large"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
        <?php }else{ ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="awesome blue medium large"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
         <?php }?>
    <?php }} ?>
</ul>