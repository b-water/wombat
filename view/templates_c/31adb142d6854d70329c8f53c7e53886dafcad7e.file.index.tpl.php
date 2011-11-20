<?php /* Smarty version Smarty-3.0.6, created on 2011-09-23 18:51:00
         compiled from ".\templates\movie/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205074e7cb8f4cc5464-99284213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31adb142d6854d70329c8f53c7e53886dafcad7e' => 
    array (
      0 => '.\\templates\\movie/index.tpl',
      1 => 1316796635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205074e7cb8f4cc5464-99284213',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-header">
    <h1>Film <small>Übersicht</small></h1>
</div>
<table id="movies" class="common-table zebra-striped">
    <thead>
        <tr>
            <th class="blue title">Titel</th>
            <th class="yellow genre">Genre</th>
            <th class="green rating">Bewertung</th>
            <th class="red format">Format</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
            <tr id="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
">
                <td class="name"><?php echo $_smarty_tpl->getVariable('item')->value->getTitle();?>
</td>
                <td class="genre">
                    <?php if ($_smarty_tpl->getVariable('item')->value->getGenre()){?>
                        <?php  $_smarty_tpl->tpl_vars['genreItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value->getGenre(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['genreItem']->key => $_smarty_tpl->tpl_vars['genreItem']->value){
?>
                            <span class="overview-genre"><?php echo $_smarty_tpl->getVariable('genreItem')->value->getName();?>
</span>
                        <?php }} ?>
                    <?php }else{ ?>
                        -
                    <?php }?>
                </td>
                <td class="rating">
                    <?php if ($_smarty_tpl->getVariable('item')->value->getRating()!=''){?>
                        <?php echo $_smarty_tpl->getVariable('item')->value->getRating();?>

                    <?php }else{ ?>
                        -
                    <?php }?>
                </td>
                <td class="format">
                    <?php if ($_smarty_tpl->getVariable('item')->value->getFormat()!=''){?>
                        <?php echo $_smarty_tpl->getVariable('item')->value->getFormat();?>

                    <?php }else{ ?>
                        -
                    <?php }?>
                </td>
                <td class="show"><a class="show" title="Anzeige" href="movie/show/single/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
                <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/single/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
                <td class="delete"><a class="delete fancydelete" title="L&ouml;schen" href="movie/delete/confirm/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
            </tr>
        <?php }} ?>
    </tbody>
</table>
