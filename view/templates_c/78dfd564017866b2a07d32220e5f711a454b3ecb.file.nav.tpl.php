<?php /* Smarty version Smarty-3.0.6, created on 2011-08-21 15:03:12
         compiled from ".\templates\nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111794e510210a9e330-65839501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78dfd564017866b2a07d32220e5f711a454b3ecb' => 
    array (
      0 => '.\\templates\\nav.tpl',
      1 => 1313931789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111794e510210a9e330-65839501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="topbar-wrapper">
    <div class="topbar">
        <div class="container fixed">
            <h3><a href="" class="logo">wombat</a></h3>
            <form action="">
                <input type="text" placeholder="Suche">
            </form>
            <ul>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navigation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['url']==$_smarty_tpl->getVariable('activ')->value){?>
                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="movie"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="awesome blue medium large"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                    <?php }?>
                <?php }} ?>
            </ul>
            <ul class="nav secondary-nav nav-config">
                <li class="menu">
                    <a class="menu menu-config" href="#">Einstellungen</a>
                    <ul class="menu-dropdown dropdown-config" style="display: none;">
                        <li><a href="">Allgemein</a></li>
                        <li><a href="">Benutzer</a></li>
                        <li><a href="">Format</a></li>
                        <li><a href="">Bewertungen</a></li>
                        <li><a href="">Genre</a></li>
                        <li><a href="">Künstler</a></li>
                        <li class="divider"></li>
                        <li><a href="">Another link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>