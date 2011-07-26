<?php /* Smarty version Smarty-3.0.6, created on 2011-07-25 19:55:10
         compiled from "./templates/pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13317797644e2dadfe4cd0f7-90460600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c65f878780f56e1097f25881d3d1b4ba7bbb2e0' => 
    array (
      0 => './templates/pager.tpl',
      1 => 1311470558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13317797644e2dadfe4cd0f7-90460600',
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
