<?php /* Smarty version Smarty-3.0.6, created on 2011-06-02 13:06:17
         compiled from ".\templates\movie/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95424de76ea9a729f9-44111585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eea1a3d46b2cb2771fac8720c855fb191bf16613' => 
    array (
      0 => '.\\templates\\movie/show.tpl',
      1 => 1307012776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95424de76ea9a729f9-44111585',
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
            <?php if ($_smarty_tpl->getVariable('movie')->value['image']!=''){?>
             <img class="movie-image left" src="<?php echo $_smarty_tpl->getVariable('movie')->value['image'];?>
" alt="Film Bild" />
            <?php }else{ ?>
                <img class="movie-image left" src="images/movie-default.png" alt="Film Bild" />
            <?php }?>
        </div>
        <p><span>Name:</span> <?php echo $_smarty_tpl->getVariable('movie')->value['name'];?>
</p>
        <p><span>Format:</span> <?php echo $_smarty_tpl->getVariable('movie')->value['format'];?>
</p>
        <p><span>Genre:</span> <?php echo $_smarty_tpl->getVariable('movie')->value['genre'];?>
</p>
        <p><span>Bewertung:</span> <?php echo $_smarty_tpl->getVariable('movie')->value['rating'];?>
</p>
    </div>
    <p class="description"><?php echo $_smarty_tpl->getVariable('movie')->value['description'];?>
</p>
</div>