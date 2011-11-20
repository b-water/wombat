<?php /* Smarty version Smarty-3.0.6, created on 2011-09-23 18:53:40
         compiled from ".\templates\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140094e7cb9941fc066-91022566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c37b1941bf97a066fe18f15fe457350d6d0f102' => 
    array (
      0 => '.\\templates\\template.tpl',
      1 => 1316796816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140094e7cb9941fc066-91022566',
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