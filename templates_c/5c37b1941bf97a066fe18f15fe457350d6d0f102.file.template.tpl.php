<?php /* Smarty version Smarty-3.0.6, created on 2011-06-11 14:42:04
         compiled from ".\templates\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84754df3629c9d3958-33812542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c37b1941bf97a066fe18f15fe457350d6d0f102' => 
    array (
      0 => '.\\templates\\template.tpl',
      1 => 1307795935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84754df3629c9d3958-33812542',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template('head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<body>
    <div id="wrapper">
        <div id="control">
            <?php $_template = new Smarty_Internal_Template('navigation.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </div>
         <div id="content">
            <?php echo $_smarty_tpl->getVariable('content')->value;?>

         </div>
    </div>
<?php $_template = new Smarty_Internal_Template('foot.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>