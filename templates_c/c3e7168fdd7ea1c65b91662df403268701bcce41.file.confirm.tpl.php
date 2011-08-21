<?php /* Smarty version Smarty-3.0.6, created on 2011-08-21 15:35:24
         compiled from ".\templates\movie/confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16114e51099c9e8f23-94749482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e7168fdd7ea1c65b91662df403268701bcce41' => 
    array (
      0 => '.\\templates\\movie/confirm.tpl',
      1 => 1313933722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16114e51099c9e8f23-94749482',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-header">
    <h1>Film <small>Löschen</small></h1>
</div>
<p>Möchten Sie diesen Film wirklich Löschen ?</p>
<div class="clearfix">
    <a href="movie/delete/single/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getValue();?>
/" class="btn primary">Löschen</a>
    <a href="movie/" class="btn">Abbrechen</a>
</div>