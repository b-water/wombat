<?php /* Smarty version Smarty-3.0.6, created on 2011-06-03 22:04:07
         compiled from ".\templates\/movie/edit_rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110944de93e378ca649-56705395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '282e7224912d0a15aea8f8f743d7dd777621c593' => 
    array (
      0 => '.\\templates\\/movie/edit_rating.tpl',
      1 => 1307131327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110944de93e378ca649-56705395',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="star-rating-radio-boxes">
    <input name="rating" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('movie')->value['rating']==1){?> checked="checked" <?php }?> class="star"/>
    <input name="rating" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('movie')->value['rating']==2){?> checked="checked" <?php }?> class="star"/>
    <input name="rating" type="radio" value="3" <?php if ($_smarty_tpl->getVariable('movie')->value['rating']==3){?> checked="checked" <?php }?> class="star"/>
    <input name="rating" type="radio" value="4" <?php if ($_smarty_tpl->getVariable('movie')->value['rating']==4){?> checked="checked" <?php }?> class="star"/>
    <input name="rating" type="radio" value="5" <?php if ($_smarty_tpl->getVariable('movie')->value['rating']==5){?> checked="checked" <?php }?> class="star"/>
</div>