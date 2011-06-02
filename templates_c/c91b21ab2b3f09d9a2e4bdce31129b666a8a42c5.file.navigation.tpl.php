<?php /* Smarty version Smarty-3.0.6, created on 2011-05-27 22:00:41
         compiled from ".\templates\navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304574de002e965e513-93437234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91b21ab2b3f09d9a2e4bdce31129b666a8a42c5' => 
    array (
      0 => '.\\templates\\navigation.tpl',
      1 => 1306526438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304574de002e965e513-93437234',
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
             <li class="<?php echo $_smarty_tpl->tpl_vars['item']->value['liclass'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="awesome red medium large <?php echo $_smarty_tpl->tpl_vars['item']->value['aclass'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
        <?php }else{ ?>
             <li class="<?php echo $_smarty_tpl->tpl_vars['item']->value['liclass'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="awesome blue medium large <?php echo $_smarty_tpl->tpl_vars['item']->value['aclass'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
         <?php }?>
    <?php }} ?>
</ul>