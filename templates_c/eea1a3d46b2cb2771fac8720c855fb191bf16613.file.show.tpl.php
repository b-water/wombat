<?php /* Smarty version Smarty-3.0.6, created on 2011-08-13 20:16:19
         compiled from ".\templates\movie/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9054dfb8c9a3835d7-81167031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eea1a3d46b2cb2771fac8720c855fb191bf16613' => 
    array (
      0 => '.\\templates\\movie/show.tpl',
      1 => 1313182113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9054dfb8c9a3835d7-81167031',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="movie-container">
    <div class="general-information">
        <div class="movie-image-container left">
            <div class="dvd-case">
            </div>
            <?php if ($_smarty_tpl->getVariable('movie')->value->getImage()!=''){?>
             <img class="movie-image left" src="<?php echo $_smarty_tpl->getVariable('movie')->value->getImage();?>
" alt="Film Bild" />
            <?php }else{ ?>
                <img class="movie-image left" src="images/movie-default.png" alt="Film Bild" />
            <?php }?>
        </div>
        <p><span>Titel:</span> <?php echo $_smarty_tpl->getVariable('movie')->value->getTitle();?>
</p>
        <p><span>Format:</span> <?php echo $_smarty_tpl->getVariable('movie')->value->getFormat();?>
</p>
        <p><span>Genre:</span> <?php echo $_smarty_tpl->getVariable('movie')->value->getGenre();?>
</p>
        <p><span>Bewertung:</span> <?php echo $_smarty_tpl->getVariable('movie')->value->getRating();?>
</p>
    </div>
    <p class="description"><?php echo $_smarty_tpl->getVariable('movie')->value->getDescription();?>
</p>
</div>