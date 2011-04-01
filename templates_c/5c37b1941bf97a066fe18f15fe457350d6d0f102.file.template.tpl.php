<?php /* Smarty version Smarty-3.0.7, created on 2011-04-01 21:01:30
         compiled from ".\templates\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31974d96210ab463f3-71888673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c37b1941bf97a066fe18f15fe457350d6d0f102' => 
    array (
      0 => '.\\templates\\template.tpl',
      1 => 1301683721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31974d96210ab463f3-71888673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template('head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<body>
    <div id="wrapper">
        <div id="sidebar">
            <?php $_template = new Smarty_Internal_Template('sidebar.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        </div>
<!--        <div id="container">-->
            <div id="content">
                 <?php echo $_smarty_tpl->getVariable('content')->value;?>

            </div>
<!--        </div>-->
    </div>
<?php $_template = new Smarty_Internal_Template('foot.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>