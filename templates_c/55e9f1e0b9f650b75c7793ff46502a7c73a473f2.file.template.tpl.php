<?php /* Smarty version Smarty-3.0.6, created on 2011-08-01 21:44:32
         compiled from "./templates/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:734353274e37022055ec97-02834515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e9f1e0b9f650b75c7793ff46502a7c73a473f2' => 
    array (
      0 => './templates/template.tpl',
      1 => 1312227869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '734353274e37022055ec97-02834515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template('head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<body>
    <section>
        <nav>
            <?php $_template = new Smarty_Internal_Template('navigation.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </nav>
         <div id="content">
            <?php echo $_smarty_tpl->getVariable('content')->value;?>

         </div>
    </section>
<?php $_template = new Smarty_Internal_Template('foot.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>