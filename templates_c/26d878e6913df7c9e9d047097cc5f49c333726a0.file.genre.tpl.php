<?php /* Smarty version Smarty-3.0.6, created on 2011-06-02 19:42:01
         compiled from ".\templates\genre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104034de7cb6932f234-20566717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26d878e6913df7c9e9d047097cc5f49c333726a0' => 
    array (
      0 => '.\\templates\\genre.tpl',
      1 => 1307036519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104034de7cb6932f234-20566717',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul id="myMenu" class="contextMenu">
    <li class="add">
        <a href="#add">Hinzufügen</a>
    </li>
    <li class="delete separator">
        <a href="#delete">Löschen</a>
    </li>
</ul>
<a class="addGenre" style="display:none;" href="movie/addGenre/"></a>
<select name="genre[]" id="genre" class="genre" size="5" multiple>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('genre')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php  $_smarty_tpl->tpl_vars['genre_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('movie')->value['genre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['genre_item']->key => $_smarty_tpl->tpl_vars['genre_item']->value){
?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->tpl_vars['genre_item']->value['genre']){?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
            <?php }?>
        <?php }} ?>
    <?php }} ?>
</select>
