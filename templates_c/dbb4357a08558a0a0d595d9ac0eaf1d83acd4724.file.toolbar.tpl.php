<?php /* Smarty version Smarty-3.0.6, created on 2011-05-28 13:05:08
         compiled from ".\templates\toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213394de0d6e4d74856-95715457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb4357a08558a0a0d595d9ac0eaf1d83acd4724' => 
    array (
      0 => '.\\templates\\toolbar.tpl',
      1 => 1306580705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213394de0d6e4d74856-95715457',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="toolbar" method="POST" action="movie/search/" id="searchbar">
    <fieldset id="toolbar">
        <a href="" class="awesome left" title="Hinzuf&uuml;gen"><img src="images/icons/add.png" alt="Neuanlage"/></a>
        <a href="" class="awesome left" title="Filtern"><img src="images/icons/page_white_magnify.png" alt="Filtern"/></a>
        <a href="" class="awesome left" title="Datendurchl&auml;ufe"><img src="images/icons/cog_go.png" alt="Datendurchl&auml;ufe" /></a>
    </fieldset>
    <input type="text" id="searchText" name="searchTextr"  />
        <a href="" class="awesome right" title="Suchen"><img src="images/icons/magnifier.png" alt="Suchen"/></a>
</form>
