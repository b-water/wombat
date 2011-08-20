<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 00:12:30
         compiled from ".\templates\dflt_paginator_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23414e45a54e25f875-18145343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8132b9d9dea9be7258874bf2f8aa834ed9e71e' => 
    array (
      0 => '.\\templates\\dflt_paginator_control.tpl',
      1 => 1313182113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23414e45a54e25f875-18145343',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="dflt_paginator_control">
    <li><a class="awesome small" title="erste Seite" href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->first;?>
">erste</a></li>
    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paginator')->value->pagesInRange; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
?>
        <?php if ($_smarty_tpl->getVariable('paginator')->value->current==$_smarty_tpl->tpl_vars['page']->value){?>
            <li><a class="active awesome small red" title="Seite <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
        <?php }else{ ?>
            <li><a class="awesome small" title="Seite <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
        <?php }?>
    <?php }} ?>
    <li><a class="awesome small" title="letzte Seite" href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->last;?>
">letzte</a></li>
</ul>
