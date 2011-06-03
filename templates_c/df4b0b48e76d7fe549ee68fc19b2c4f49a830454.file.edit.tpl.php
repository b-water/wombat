<?php /* Smarty version Smarty-3.0.6, created on 2011-06-03 13:43:41
         compiled from ".\templates\movie/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42704de8c8edc67484-64415006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df4b0b48e76d7fe549ee68fc19b2c4f49a830454' => 
    array (
      0 => '.\\templates\\movie/edit.tpl',
      1 => 1307101420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42704de8c8edc67484-64415006',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="edit" class="jqtransform" method="POST" action="movie/update/id/<?php echo $_smarty_tpl->getVariable('movie')->value['id'];?>
/" enctype="multipart/form-data" >
    <div class="notice good">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div id="left-fields">
        <fieldset>
            <div class="movie-image-container">
                <div class="dvd-case">
                </div>
                <?php if ($_smarty_tpl->getVariable('movie')->value['image']!=''){?>
                <img class="movie-image" src="<?php echo $_smarty_tpl->getVariable('movie')->value['image'];?>
" alt="Film Bild" />
                <?php }else{ ?>
                <img class="movie-image" src="images/movie-default.png" alt="Film Bild" />
                <?php }?>
            </div>
        </fieldset>
        <fieldset>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('movie')->value['name'];?>
" />
        </fieldset>
        <fieldset>
            <label>Format</label>
        <?php $_template = new Smarty_Internal_Template('/movie/edit_format.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset>
            <label for="fake-text">Bild</label>
            <div class="hidden-file-container">
                <input type="text" class="fake-text" name="fake-text" value="<?php echo $_smarty_tpl->getVariable('movie')->value['image'];?>
"  />
                <input type="file" onchange="$('.fake-text').val($(this).val());" name="cover" class="hidden-file" id="cover" />
            </div>
        </fieldset>
        <fieldset>
            <label>Bewertung</label>
        <?php $_template = new Smarty_Internal_Template('/movie/edit_rating.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset class="left"> 
            <label>Trailer</label><br>
            <input type="text" name="trailer" id="trailer" value="<?php echo $_smarty_tpl->getVariable('movie')->value['trailer'];?>
" />
        </fieldset> 
    </div>
    <div id="right-fields">
        <fieldset>
            <label for="description">Beschreibung</label>
            <textarea id="description" name="description"><?php echo $_smarty_tpl->getVariable('movie')->value['description'];?>
</textarea>
        </fieldset>
        <fieldset class="col">
            <?php $_template = new Smarty_Internal_Template('/movie/edit_genre.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
                <fieldset class="col">
            <?php $_template = new Smarty_Internal_Template('/movie/edit_actor.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset class="right">
            <input type="submit" class="small awesome" value="Speichern" />
            <input type="button" class="small awesome abort" value="Zur&uuml;ck" />
        </fieldset>
    </div>
</form>