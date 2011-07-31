<?php /* Smarty version Smarty-3.0.6, created on 2011-07-31 14:24:38
         compiled from "./templates/movie/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8786286034e3549868c2db5-03824040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c872a3d6a8b5a72b87338529ea53361f9f7778fc' => 
    array (
      0 => './templates/movie/overview.tpl',
      1 => 1312115027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8786286034e3549868c2db5-03824040',
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
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/edit/delete/id/<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
/"></a></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
