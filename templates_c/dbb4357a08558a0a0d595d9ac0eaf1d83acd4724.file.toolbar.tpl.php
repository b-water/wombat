<?php /* Smarty version Smarty-3.0.6, created on 2011-05-27 20:37:16
         compiled from ".\templates\toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4594ddfef5c231028-03560614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb4357a08558a0a0d595d9ac0eaf1d83acd4724' => 
    array (
      0 => '.\\templates\\toolbar.tpl',
      1 => 1306349671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4594ddfef5c231028-03560614',
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
    <input type="text" id="searchText" name="searchTextr" value="Bitte geben Sie einen Suchbegriff ein" />
<!--    <input type="submit" class="small awesome" name="searchbarSubmit" value="Suchen" />-->
        <a href="" class="awesome right" title="Hinzuf&uuml;gen"><img src="images/icons/magnifier.png" alt="Suchen"/></a>
</form>
