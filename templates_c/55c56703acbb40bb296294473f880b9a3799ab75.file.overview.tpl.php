<?php /* Smarty version Smarty-3.0.6, created on 2011-06-17 23:54:27
         compiled from ".\templates\movie/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107514dfbcd13493578-43109264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55c56703acbb40bb296294473f880b9a3799ab75' => 
    array (
      0 => '.\\templates\\movie/overview.tpl',
      1 => 1308347663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107514dfbcd13493578-43109264',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Titel</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
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
                <?php  $_smarty_tpl->tpl_vars['genre_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value->getGenre(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['genre_item']->key => $_smarty_tpl->tpl_vars['genre_item']->value){
?>
                    <span class="overview-genre"><?php echo $_smarty_tpl->tpl_vars['genre_item']->value['name'];?>
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
            <td class="show"><a class="show" title="Anzeige" href="movie/show/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/delete/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
