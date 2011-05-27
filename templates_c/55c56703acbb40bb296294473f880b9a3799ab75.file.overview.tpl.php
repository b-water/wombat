<?php /* Smarty version Smarty-3.0.6, created on 2011-05-27 22:24:14
         compiled from ".\templates\movie/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159334de0086ebb31f3-73026462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55c56703acbb40bb296294473f880b9a3799ab75' => 
    array (
      0 => '.\\templates\\movie/overview.tpl',
      1 => 1306527853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159334de0086ebb31f3-73026462',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="format">Gr&ouml;&szlig;e</th>
            <th class="date">Datum</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <tr id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            <td class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
            <td class="genre"><?php echo $_smarty_tpl->tpl_vars['item']->value['genre'];?>
</td>
            <td class="rating"><?php echo $_smarty_tpl->tpl_vars['item']->value['rating'];?>
</td>
            <td class="format"><?php echo $_smarty_tpl->tpl_vars['item']->value['format'];?>
</td>
            <td class="size"><?php echo $_smarty_tpl->tpl_vars['item']->value['size'];?>
</td>
            <td class="date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
            <td class="show"><a class="show" title="Anzeigen" href="movie/show/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"></a></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
