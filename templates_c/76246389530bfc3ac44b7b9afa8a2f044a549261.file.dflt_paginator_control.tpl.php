<?php /* Smarty version Smarty-3.0.6, created on 2011-07-29 21:56:56
         compiled from "./templates/dflt_paginator_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9150527904e331088aaba87-33830773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76246389530bfc3ac44b7b9afa8a2f044a549261' => 
    array (
      0 => './templates/dflt_paginator_control.tpl',
      1 => 1311969415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9150527904e331088aaba87-33830773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="dflt_paginator_control">
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['page']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['name'] = 'page';
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('pageCount')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['page']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['page']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['page']['total']);
?>
    <li>
        <a href="/page/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
</a>
    </li>
<?php endfor; endif; ?>
</ul>
