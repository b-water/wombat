<?php /* Smarty version Smarty-3.0.6, created on 2011-08-20 22:40:24
         compiled from ".\templates\movie/single.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76824e501bb89a0bf0-81976151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af6c7817662f57130df5fd2f8ef45829af58c4c4' => 
    array (
      0 => '.\\templates\\movie/single.tpl',
      1 => 1313871970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76824e501bb89a0bf0-81976151',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-header">
    <h1>Film <small>Detailansicht</small></h1>
</div>
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