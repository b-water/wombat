<?php /* Smarty version Smarty-3.0.6, created on 2011-08-20 22:14:23
         compiled from ".\templates\paginator_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122004e50159f355dd5-06767555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '762cdb3e07571dfd2f1184e65c8abc476d71b004' => 
    array (
      0 => '.\\templates\\paginator_control.tpl',
      1 => 1313871260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122004e50159f355dd5-06767555',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="pagination">
    <ul>
        <?php if ($_smarty_tpl->getVariable('paginator')->value->current==$_smarty_tpl->getVariable('paginator')->value->first){?>
            <li class="prev disabled"><a href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->first;?>
">&larr; erste</a></li>
        <?php }else{ ?>
            <li class="prev"><a href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->first;?>
">&larr; erste</a></li>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paginator')->value->pagesInRange; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
?>
            <?php if ($_smarty_tpl->getVariable('paginator')->value->current==$_smarty_tpl->tpl_vars['page']->value){?>
                <li class="active"><a href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
            <?php }?>
        <?php }} ?>
        <?php if ($_smarty_tpl->getVariable('paginator')->value->current==$_smarty_tpl->getVariable('paginator')->value->last){?>
            <li class="next disabled"><a  href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->last;?>
">letzte &rarr;</a></li>

        <?php }else{ ?>
            <li class="next"><a href="<?php echo $_smarty_tpl->getVariable('urlParser')->value->getPackage();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getController();?>
/<?php echo $_smarty_tpl->getVariable('urlParser')->value->getAction();?>
/page/<?php echo $_smarty_tpl->getVariable('paginator')->value->last;?>
">letzte &rarr;</a></li>
        <?php }?>
    </ul>
</div>