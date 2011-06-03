<?php /* Smarty version Smarty-3.0.6, created on 2011-06-03 22:00:41
         compiled from ".\templates\movie/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76544de93d696339b6-79065329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df4b0b48e76d7fe549ee68fc19b2c4f49a830454' => 
    array (
      0 => '.\\templates\\movie/edit.tpl',
      1 => 1307131185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76544de93d696339b6-79065329',
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
            <?php $_template = new Smarty_Internal_Template('/movie/edit_rating.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
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
            <label>Dauer (in Minuten)</label>
            <input type="text" name="duration" id="duration" value="<?php echo $_smarty_tpl->getVariable('movie')->value['duration'];?>
" />
        </fieldset> 
        <fieldset> 
            <label>Jahr</label>
            <input type="text" name="year" id="year" value="<?php echo $_smarty_tpl->getVariable('movie')->value['year'];?>
" />
        </fieldset> 
    </div>
    <div id="right-fields">
        <fieldset class="col col-left"> 
            <label>Trailer</label>
            <input type="text" name="trailer" id="trailer" value="<?php echo $_smarty_tpl->getVariable('movie')->value['trailer'];?>
" />
        </fieldset> 
        <fieldset>
            <label for="description">Beschreibung</label>
            <textarea id="description" name="description"><?php echo $_smarty_tpl->getVariable('movie')->value['description'];?>
</textarea>
        </fieldset>
        <fieldset class="col col-left">
            <?php $_template = new Smarty_Internal_Template('/movie/edit_genre.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
        <fieldset class="col">
            <?php $_template = new Smarty_Internal_Template('/movie/edit_artist.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </fieldset>
    </div>
    <div id="center-fields">
        <input type="submit" class="small awesome right" value="Speichern" />
    </div>
</form>