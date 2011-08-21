<?php /* Smarty version Smarty-3.0.6, created on 2011-08-20 16:03:50
         compiled from ".\templates\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98904e4fbec6a855d2-60900243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c37b1941bf97a066fe18f15fe457350d6d0f102' => 
    array (
      0 => '.\\templates\\template.tpl',
      1 => 1313849027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98904e4fbec6a855d2-60900243',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<body>
    <section class="container">
        <nav>
            <?php $_template = new Smarty_Internal_Template('nav.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </nav>
        <section class="content">
            <?php echo $_smarty_tpl->getVariable('content')->value;?>

        </section>
    </section>
</body>
<?php $_template = new Smarty_Internal_Template('foot.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>