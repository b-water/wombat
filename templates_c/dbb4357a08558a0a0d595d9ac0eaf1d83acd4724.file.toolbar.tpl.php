<?php /* Smarty version Smarty-3.0.6, created on 2011-05-28 18:04:29
         compiled from ".\templates\toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87804de11d0ded45e6-76123170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb4357a08558a0a0d595d9ac0eaf1d83acd4724' => 
    array (
      0 => '.\\templates\\toolbar.tpl',
      1 => 1306598668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87804de11d0ded45e6-76123170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="toolbar" method="POST" action="movie/search/" id="searchbar">
    <fieldset id="toolbar">
        <a href="" class="awesome left" title="Hinzuf&uuml;gen"><img src="images/icons/add.png" alt="Neuanlage"/></a>
        <a href="" class="awesome left" title="Filtern"><img src="images/icons/page_white_magnify.png" alt="Filtern"/></a>
        <a href="" class="awesome left" title="Werkzeuge"><img src="images/icons/wrench_orange.png" alt="Werkzeuge" /></a>
    </fieldset>
    <input type="text" id="searchText" name="searchTextr"  />
        <a href="" class="awesome right" title="Suchen"><img src="images/icons/magnifier.png" alt="Suchen"/></a>
</form>
