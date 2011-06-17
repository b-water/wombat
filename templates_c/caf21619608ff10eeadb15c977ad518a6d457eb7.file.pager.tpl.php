<?php /* Smarty version Smarty-3.0.6, created on 2011-06-17 19:31:14
         compiled from ".\templates\pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32934dfb8f620843d8-47536946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caf21619608ff10eeadb15c977ad518a6d457eb7' => 
    array (
      0 => '.\\templates\\pager.tpl',
      1 => 1305053150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32934dfb8f620843d8-47536946',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="pager" class="pager">
    <form>
        <img src="images/tablepager/control_start.png" class="first"/>
        <img src="images/tablepager/control_rewind.png" class="prev"/>
        <input type="text" class="pagedisplay"/>
        <img src="images/tablepager/control_fastforward.png" class="next"/>
        <img src="images/tablepager/control_end.png" class="last"/>
        <select class="pagesize">
            <option selected="selected"  value="20">20</option>
            <option value="30">30</option>
            <option  value="40">40</option>
        </select>
    </form>
</div>
