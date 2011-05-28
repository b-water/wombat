<?php /* Smarty version Smarty-3.0.6, created on 2011-05-28 12:54:23
         compiled from ".\templates\movie/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111284de0d45f50f7b0-81149468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df4b0b48e76d7fe549ee68fc19b2c4f49a830454' => 
    array (
      0 => '.\\templates\\movie/edit.tpl',
      1 => 1306580062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111284de0d45f50f7b0-81149468',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="edit" method="POST" action="movie/update/" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('movie')->value['id'];?>
" />
    <h2>Film bearbeiten</h2>
    <div id="left-fields">
        <fieldset>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('movie')->value['name'];?>
" />
        </fieldset>
        <fieldset>
            <label>Format</label>
        <?php $_template = new Smarty_Internal_Template('format.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset>
            <label>Genre</label>
        <?php $_template = new Smarty_Internal_Template('genre.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset>
        <?php if ($_smarty_tpl->getVariable('movie')->value['thumbnail']!=''){?>
            <img src="<?php echo $_smarty_tpl->getVariable('movie')->value['thumbnail'];?>
" alt="thumbnail cover" />
        <?php }?>
            <label for="cover">Bild</label>
            <div class="hidden-file-container">
                <input type="text" class="fake-text"  />
                <input type="file" onchange="$('.fake-text').val($(this).val());" name="cover" class="hidden-file" id="cover" />
            </div>
        </fieldset>
        <fieldset>
            <label>Bewertung</label>
        <?php $_template = new Smarty_Internal_Template('rating.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset>
            <label>Größe</label>
            <input type="text" name="size" value="<?php echo $_smarty_tpl->getVariable('movie')->value['size'];?>
" />
        </fieldset>
    </div>
    <div id="right-fields">
        <fieldset>
            <label for="description">Beschreibung</label>
            <textarea id="description" name="description"><?php echo $_smarty_tpl->getVariable('movie')->value['description'];?>
</textarea>
        </fieldset>
        <fieldset class="right">
            <input type="submit" class="small awesome" value="Speichern" />
            <input type="button" class="small awesome" onclick="changeLocation('movie');" value="Abbrechen" />
        </fieldset>
    </div>
</form>